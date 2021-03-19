import smtplib
sender = '360storereport@gmail.com'
recipient = 'shahbazlatheef@gmail.com'
content = "hello world"
username = '360storereport@gmail.com'
password = 'Abbasali@360store'
mail = smtplib.SMTP('smtp.gmail.com', 587)
mail.ehlo()
mail.starttls()
mail.login(username, password)
header = 'To:' + recipient + '\n' + 'From: ' \
    + sender + '\n' + 'Subject:testing \n'
content = header+content
mail.sendmail(sender, recipient, content)
mail.close()
