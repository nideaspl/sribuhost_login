import pandas as pd
import os
from docx import Document
from docx.shared import Inches
from PIL import Image as PILImage
import pymysql
import subprocess
import json
import os
import re
# Configure database connection with UTF-8 charset
db = pymysql.connect(
    host="127.0.0.1",
    user="kali",
    password="password",
    database="jxzjcx",
    charset='utf8mb4',
    use_unicode=True
)
# Create database cursor
cursor = db.cursor()
excel_file_path = 'yuhang_gongyinglian.xlsx'


# 读取Excel文件
df = pd.read_excel(excel_file_path)

# 报告保存目录
output_dir = 'reports'
os.makedirs(output_dir, exist_ok=True)

# 为每个公司生成一个Word报告
for index, row in df.iterrows():
    company_name = row['company_name']  
    district = row['district'] 
    city = row['city'] 
    province = row['province'] 
    refistered_captital = row['refistered_captital'] 
    registered_address = row['registered_address'] 
    tags = row['tags'] 


    print(f"Processing {company_name}...")
    cursor.execute("INSERT INTO ns_aw_isp_enterprise (company_name,district,city,province,refistered_captital,registered_address,tags) VALUES (%s,%s,%s,%s,%s,%s,%s)", (company_name,district,city,province,refistered_captital,registered_address,tags,))


print("Inserted successfully.")
