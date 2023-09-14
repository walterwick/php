import instaloader
from flask import Flask, request

app = Flask(__name__)

@app.route('/', methods=['GET', 'POST'])
def index():
    if request.method == 'POST':
        username = request.form['username']
        profile = get_instagram_profile(username)
        return f'''
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Instagram Profil Bilgisi</title>
        </head>
        <body>
            <h1>Instagram Profil Bilgisi</h1>
            <p>Username: {profile.username}</p>
            <p>Number of Posts: {profile.mediacount}</p>
            <p>Followers: {profile.followers}</p>
            <p>Followees: {profile.followees}</p>
            <p>Bio: {profile.biography}</p>
            <p>Full Name: {profile.full_name}</p>
            <p>Profile Pic URL: <a href="{profile.profile_pic_url}" target="_blank">{profile.profile_pic_url}</a></p>
        </body>
        </html>
        '''
    else:
        return '''
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Instagram Profil Bilgisi</title>
        </head>
        <body>
            <h1>Instagram Profil Bilgisi</h1>
            <form method="POST">
                <label for="username">Instagram Kullanıcı Adı:</label>
                <input type="text" id="username" name="username" required>
                <button type="submit">Profil Bilgisini Getir</button>
            </form>
        </body>
        </html>
        '''

def get_instagram_profile(username):
    insta = instaloader.Instaloader()
    profile = instaloader.Profile.from_username(insta.context, username)
    return profile

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=81)
