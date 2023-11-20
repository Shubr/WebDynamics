import re

def remove_this_this(content):
   return re.sub('<!--.*?-->', '', content, flags=re.DOTALL)

with open('register.html', 'r') as file:
   content = file.read()

content = remove_this_this(content)

with open('register.html', 'w') as file:
   file.write(content)