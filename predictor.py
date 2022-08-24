# -*- coding: utf-8 -*-

#Install python dependencies
#!pip install google-play-scraper
#!pip install wordcloud
#!pip install seaborn
#!pip install matplotlib
#!pip install scikit-learn

#print('The scikit-learn version is {}.'.format(sklearn.__version__))
#print('The scikit-learn version is {}.'.format(sklearn.__version__))
# scikit-learn version is 1.0.2.

# Command line:
# python predictor.py com.shopee.id 10 1 0.85

##########################################################
# 1. IMPORT ALL PACKAGES
##########################################################
import pandas as pd
from collections import Counter
import seaborn as sns
from sklearn.linear_model import Perceptron
import sklearn
import joblib
from google_play_scraper import app
from google_play_scraper import Sort, reviews
import numpy as np
import string
import re
import nltk
nltk.download("stopwords"); # Filtering (Stopword Removal)
from nltk.corpus import stopwords
import matplotlib.pyplot as plt
from wordcloud import WordCloud, STOPWORDS, ImageColorGenerator
import sys

# Function to Download Ulasan/Reviews dari Google Play Store
def download_reviews(txt_id, int_count, int_filter):
    result, continuation_token = reviews(
        txt_id+'',
        lang              = 'id', # defaults to 'en'
        country           ='id', # defaults to 'us'
        sort              = Sort.MOST_RELEVANT, # defaults to Sort.MOST_RELEVANT
        count             = int_count, # defaults to 100
        filter_score_with = int_filter # defaults to None (means all score)
    )
    
    # Put the Reviews into Pandas DataFrame
    df_review = pd.DataFrame(np.array(result),columns=['review'])
    df_review = df_review.join(pd.DataFrame(df_review.pop('review').tolist()))
    #df_review = df_review[df_review.columns.intersection(["userName", "reviewId","content","score", "at"])]
    df_review = df_review.reindex(columns=["userName", "reviewId","content","score", "at"])
    return df_review;

# Function to save and display wordcloud
def save_display_wordcloud(df_input, save_path, target_class):
    txt_review = " ".join(review for review in df_input.loc[df_input['pred_class'] == target_class].content)
    
    if not txt_review: # check if string empty
        txt_review = 'null';

    # create the wordcloud object
    wordcloud = WordCloud(background_color='white', collocations=False).generate(txt_review)
    plt.imshow(wordcloud, interpolation='bilinear') # show wordcloud
    plt.axis("on") # view garis coordinate
    plt.savefig(save_path) # save file image
    plt.close() # Save Plot Without Displaying
    #plt.show()

# Function to remove punctuations
def remove_punctuations(text):
    for sym_punc in string.punctuation:
      text = text.replace(sym_punc, ' ') 
      text = re.sub(' +', ' ', text) # replace multiple spaces with single space
    return text;

# Function to remove duplicate characters
def remove_duplicate_chars(text):
    pattern = r'(.)\1+' # (.) any character repeated (\+) more than
    repl = r'\1'        # replace it once
    text = re.sub(pattern, repl, text);
    return text;

# Function to load filter to list (berisi kata-kata yang akan di filter)
def load_indonesia_filter():
    # get stop words
    filtering = stopwords.words("indonesian");
    # append additional stopword
    filtering.extend(["yg", "dg", "rt", "dgn", "ny", "d", 'klo', "pdhal", "jg", "jga", "hrs", 
                      "dl", "dlm", "udah", "nyoba", "tetep", "ja", "aju", "sih", "tp", "skrg", 
                      "pas", "karna", "dah", "gitu", "x", "udan", "doang", "tai", "pas", 
                      "udh", "or", "eh", "j", "s", "oke", "eh", "gp", "g", "sya", "dl", "knpa", 
                      "hrs", "trs", "uda", "pake", "tgl", "knp", "jnt", 'kalo', 'amp', 'biar', 
                      'bikin', 'bilang', 'gak', 'ga', 'krn', 'nya', 'nih', 'sih', 'si', 'tau', 
                      'tdk', 'tuh', 'utk', 'ya', 'jd', 'jgn', 'sdh', 'aja', 'n', 't', 'nyg', 
                      'hehe', 'pen', 'dr', 'u', 'nan', 'loh', 'rt', '&amp', 'yah', "br", "href", "saya", "kamu", "ini", 
                      "tapi", "lagi", "lot", "belanja", "dan", "di", "fb", "aku", "shope", "apk", "aplikasi", "barang",
                      "shopee", "blibli", "bukalapak", "lazada", "tokopedia"])
    filtering.remove("padahal")
    return filtering;

if __name__ == '__main__':
    # input parameter for downloading data
    param_id = ""+str(sys.argv[1]); # example "com.shopee.id"
    param_count_download = int(sys.argv[2]); # total sample
    param_decision_threshold = 0.75; # 0.85 decision-making threshold

    if int(sys.argv[3]) == 1: # rating/star
        param_filter_score = 1;
    elif int(sys.argv[3]) == 2:
        param_filter_score = 2;
    elif int(sys.argv[3]) == 3:
        param_filter_score = 3;
    elif int(sys.argv[3]) == 4:
        param_filter_score = 4;
    elif int(sys.argv[3]) == 5:
        param_filter_score = 5;
    else:
        param_filter_score = None; # filter with rating 1, 2, 3, 4 and 5. (Default None means random)
        
    # download data
    ori_data = download_reviews(param_id, param_count_download, param_filter_score);
    data = ori_data.copy(); # copy DataFrame
    
    # view 10 rows
#    data.head(10)
    
    # Data preprocessing
    data['content'] = data['content'].str.replace('\d+', '', regex=True) # Remove numbers from string
    data['content'] = data['content'].apply(lambda x:x.lower()) # Change Strings to lowercase
    data["content"] = data['content'].apply(remove_punctuations) # Remove punctuations (Annotation Removal)
    data["content"] = data['content'].apply(remove_duplicate_chars) # Remove repeated characters
    data['content'] = data['content'].apply(lambda x: x.encode('ascii', 'ignore').decode('ascii')) # Remove emojis
    
    # load filter words
    filter_words = load_indonesia_filter();
    
    # remove stop words (filtering)
    data['content'] = data['content'].apply(lambda words: ' '.join(word.lower() for word in words.split() if word not in filter_words))
    data = data.dropna(subset=['content']) # Remove Missing Values
    
#    data
    
    ##########################################################
    # 4. FEATURE EXTRACTION TECHNIQUES
    ##########################################################
    # load object vectorizer (vocabulary)
    vectorizer = joblib.load("C:/xampp/htdocs/sentipred/data/model/vectorizer_all.pkl")
    
    # Printing the identified Unique words along with their indices
#    print("Vocabulary: ", vectorizer.vocabulary_)
    
    # Add column for class/label ("positive = 0", "Negative = 1", "Neutral = 2")
    # Generate feature [input data] from dictionary
    test_data = vectorizer.transform(data['content']).toarray()
    x_test = pd.DataFrame(data = test_data, columns = vectorizer.get_feature_names())
    #x_test.to_csv('/content/drive/MyDrive/test_data.csv', encoding='utf-8', index=False)
    
#    x_test
    
    ##########################################################
    # 7. LOAD MODEL Perceptron Algorithms
    ##########################################################
    import pickle
    # save the model to disk
    filename = 'C:/xampp/htdocs/sentipred/data/model/perceptron_classifier.model'
    
    # load the model from disk
    loaded_model = pickle.load(open(filename, 'rb'))
    
#    data
    
    # predict label and probability
    #label_pred = loaded_model.predict(x_test) # threshold >= 0.5 (only)
    pred_proba = loaded_model.predict_proba(x_test)
    
#    pred_proba
    
    # Create columns for each sentiment prediction
    class_pos = [];
    class_neg = [];
    label_pred_namual = [];
    
    for score in pred_proba:
      class_pos.append(str(round((score[0]*100), 2))+"%");
      class_neg.append(str(round((score[1]*100), 2))+"%");
          
      if score[0] >= param_decision_threshold: # >= 0.85
        label_pred_namual.append("Pos");
      else:
        label_pred_namual.append("Neg");

    data["pred_class"] = label_pred_namual
    ori_data["pred_class"] = label_pred_namual
    ori_data["pred_pos"] = class_pos
    ori_data["pred_neg"] = class_neg
    
    # replace prediction class to a label name
    data["pred_class"] = data["pred_class"].replace([0.0, 1.0], ['Pos','Neg'])
    ori_data["pred_class"] = ori_data["pred_class"].replace([0.0, 1.0], ['Pos','Neg'])
    
#    ori_data
    
    # Data distribution for each class
    dst_train = Counter(ori_data['pred_class'])
#    print(dst_train)
    
    # declare data
    if dst_train.get('Pos') == None:
        data_values = [0, dst_train.get('Neg')]
        key_class_name = ['Positive (0)', 'Negative ('+str(data_values[1])+')'];
    elif dst_train.get('Neg') == None:
        data_values = [dst_train.get('Pos'), 0]
        key_class_name = ['Positive ('+str(data_values[0])+')', 'Negative (0)'];
    else:
        data_values = [dst_train.get('Pos'), dst_train.get('Neg')]
        key_class_name = ['Positive ('+str(data_values[0])+')', 'Negative ('+str(data_values[1])+')'];
      
      
    # declaring exploding pie
    explode = [0.1, 0]  
    # define Seaborn color palette to use
    palette_color = sns.color_palette('bright')
    #palette_color = sns.color_palette('dark')
    # plotting data on chart
    plt.pie(data_values, labels=key_class_name, explode=explode, colors=palette_color, autopct='%.0f%%')
    plt.savefig('C:/xampp/htdocs/sentipred/image/pie.png')
    plt.close() # Save Plot Without Displaying
    #plt.show() # displaying chart
    
    # Call function and save positive sentiment
    img_path = "C:/xampp/htdocs/sentipred/image/pos_sentiment.png"
    input_target_class = "Pos"; # Positive sentiment = "Pos" dan Negative sentiment = "Neg".
    save_display_wordcloud(data, img_path, input_target_class);
    
    # Call function and save positive sentiment
    img_path = "C:/xampp/htdocs/sentipred/image/neg_sentiment.png"
    input_target_class = "Neg"; # Positive sentiment = "Pos" dan Negative sentiment = "Neg".
    save_display_wordcloud(data, img_path, input_target_class);
    
    # save output pandas dataframe
    ori_data.to_csv('C:/xampp/htdocs/sentipred/data/output_final_data.csv', encoding='utf-8', index=False)
    
    print("success !!!");
    