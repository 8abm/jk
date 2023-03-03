import os
os.system("pip install requests")
os.system("pip install telebot")
os.system("pip install Pytelegrambotapi==4")
import requests,random
import telebot
myid = str("1934060947")
token = '2007239629:AAFYeAeDAgwazm3UCCQ9KZlrsx54ssEYCa4'
bot = telebot.TeleBot(token)
@bot.message_handler(commands=['hunt'])
def user(message):
    name2 = message.from_user.first_name
    bot.reply_to(message,f" Hi {name2} \n send check")
    print(7)
@bot.message_handler(func=lambda m:True)
def info(message):
    bot.send_message(message.chat.id,'the check is start')
    inf = message.text
    if "check" in inf:
        while True:
            user1 = str("".join(random.choice('qwertyuioplkjhgfdsamnbvcxz')for x in range(1)))
            user2 = str("".join(random.choice('qwertyuio.plkjh_gfdsa_mnbvc.xz')for x in range(1)))
            user3 = str("".join(random.choice('abcdef_ghijnklmnop.qrstuvwxyz1._2345_678.90')for x in range(1)))
            user4 = str("".join(random.choice('qwert_yui_oplkj_hgfdsa_mnbvcxz12345678_90')for x in range(1)))
            userr = user1+user2+user3+user4
            userr6 = user1+user2+"."+user4
            user = userr
            req = requests.get(f"https://www.tiktok.com/@{user}",headers = {
        'accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
        'accept-encoding': 'gzip, deflate',
        'accept-language': 'en-US,en;q=0.9,ar;q=0.8',
        'cache-control': 'max-age=0',
        'sec-ch-ua': '" Not;A Brand";v="99", "Google Chrome";v="91", "Chromium";v="91"',
        'sec-ch-ua-mobile': '?0',
        'sec-fetch-dest': 'document',
        'sec-fetch-mode': 'navigate',
        'sec-fetch-site': 'same-origin',
        'sec-fetch-user': '?1',
        'upgrade-insecure-requests': '1',
        'user-agent': 'Mozilla/5.0(Windows NT 10.0;Win64;x64) AppleWebKit/537.36(KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
    }).text
            if 'content=" on TikTok | Watch the latest video from ."' in req:
                    bot.send_message(message.chat.id,f"{user}\n https://www.tiktok.com/@{user}",reply_to_message_id=message.message_id)
                    print(f"{user} ✅")
            else:
                print(f"{user} ❌")
    else:
        bot.send_message(message.chat.id,f"ارسل الامر الصحيح",reply_to_message_id=message.message_id)
bot.polling(none_stop=False)