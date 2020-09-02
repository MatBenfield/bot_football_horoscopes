"""
Build
"""
 # importing modules
import re
import os
import csv
import time
import random
import pathlib
# setup
root = pathlib.Path(__file__).parent.parent.resolve()

# functions
def replace_chunk(content, marker, chunk):
    replacer = re.compile(
        r"<!\-\- {} starts \-\->.*<!\-\- {} ends \-\->".format(marker, marker),
        re.DOTALL,
    )
    chunk = "<!-- {} starts -->\n{}\n<!-- {} ends -->".format(marker, chunk, marker)
    return replacer.sub(chunk, content)

# processing
with open('data.csv') as csvfile:
    reader = csv.DictReader(csvfile)
    random_row = random.choice(list(reader))
    data_item_text = random_row['text']

if __name__ == "__main__":
    readme = root / "README.md"
    readme_contents = readme.open().read()
    rewritten = replace_chunk(readme_contents, "scrum_item", data_item_text)
    readme.open("w").write(rewritten)
    print (data_item_text)
