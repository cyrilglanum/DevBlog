# DevBlog, DEVBLOG, l'informatique au quotidien

The DevBlog website is a professionnal blog who purposes articles to read and possibility to comments them.
The project have been developped without framework. Only some necessaries librairies have been installed like Bootstrap to pay 
more attention to the back-end of the website and get the expected results.

So the website have less functionnalities than a knonw framework-website development.

## Site web

http://www.festivalonair.com

## Installation

Github'Link : https://github.com/cyrilglanum/DevBlog.git

```bash
git clone https://github.com/cyrilglanum/DevBlog.git
```

Clone the project via the github link to get it locally. The local project have some troubles with URL's.
The online project have been optimised to get the more fluidity as possible.

After the clone action, we'll need to make a composer install to get all librairies.

```bash
composer install
```

Next we will care about the database.

db_name=devblog
username=root
password=

Take file bdddevblog.sql and deploy into SQL on phpmyAdmin with a database named devblog.

Dans BaseRepository, adaptez la ligne en fonction des identifiants.

```bash
$this->db = new PDO('mysql:host=localhost;dbname=db_name;charset=utf8', 'username', 'password');
```
## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

