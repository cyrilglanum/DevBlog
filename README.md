# DevBlog, DEVBLOG, l'informatique au quotidien


Le site web est un blog professionnel proposant des articles à la lecture et la possibilité de commenter les articles.
Le projet a été développé sans framework en très grande partie. Seule des librairies comme boostrap ont été ajoutées
pour pouvoir travailler en principal sur le back-end.

Il présente donc des fonctionnalités moins avancées qu'un site développé sous framework reconnu.

## Site web

http://www.festivalonair.com

## Installation

lien Github : https://github.com/cyrilglanum/DevBlog.git

```bash
git clone https://github.com/cyrilglanum/DevBlog.git
```

Cloner le projet via le lien github pour l'avoir localement.
Le projet en local ne contient pas les mêmes avantages qu'en ligne ou il a été optimisé en ligne du fait que des
soucis d'URL ont été repérés lorsque le projet en local est déployé à l'identique en ligne.

Après le clonage, il faudra faire un composer install pour mettre à jour toutes les librairies dont on a besoin.

```bash
npm install
```

Et ensuite gérer les Vhost pour voir apparaitre le projet en local.

Il est donc conseillé de tester en ligne toutes les fonctionnalités, et le développement peut être fait en local mais
le CSS ne suit pas tout le temps en fonction des URL's.


## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

