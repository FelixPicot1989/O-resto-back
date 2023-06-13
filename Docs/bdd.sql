-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'entrées',	'2023-06-08 12:12:09',	NULL),
(2,	'plats',	'2023-06-08 12:12:17',	NULL),
(3,	'desserts',	'2023-06-08 12:12:27',	NULL),
(5,	'vins',	'2023-06-08 12:22:13',	NULL),
(6,	'bières',	'2023-06-08 12:22:20',	NULL),
(7,	'soft',	'2023-06-08 12:22:28',	NULL),
(8,	'cocktails',	'2023-06-08 12:22:40',	NULL),
(9,	'salades',	'2023-06-08 12:23:05',	NULL),
(10,	'pizzas',	'2023-06-08 12:23:12',	NULL),
(11,	'viandes',	'2023-06-08 12:24:44',	NULL),
(12,	'poissons',	'2023-06-08 12:24:52',	NULL),
(13,	'eaux',	'2023-06-08 12:26:41',	NULL),
(14,	'apéritif',	'2023-06-08 12:26:49',	NULL),
(15,	'digestifs',	'2023-06-08 12:26:56',	NULL),
(16,	'boissons chaudes',	'2023-06-08 12:27:03',	NULL);

INSERT INTO `drink` (`id`, `name`, `description`, `price`, `alcool`, `created_at`, `updated_at`, `category_id`) VALUES
(1,	'Bordeaux Roche-Mazet',	'Vin rouge, tannique, rond en bouche',	18.00,	1,	'2023-06-08 12:29:14',	NULL,	5),
(2,	'Côtes de provence',	'Vin rosé, notes fruitées',	17.00,	1,	'2023-06-08 12:30:17',	NULL,	5),
(3,	'Côteaux du Layon',	'Vin blanc moelleux, de caractère',	16.00,	1,	'2023-06-08 12:31:02',	NULL,	5),
(4,	'Leffe',	'Bière pression, disponible en 33 cl.',	4.00,	1,	'2023-06-08 12:32:19',	NULL,	6),
(5,	'Heineken 0 ',	NULL,	3.80,	0,	'2023-06-08 12:32:52',	NULL,	6),
(6,	'Kasteel',	'Bière en bouteille brune, 8 degrés, 33 cl',	4.50,	1,	'2023-06-08 12:33:53',	NULL,	6),
(7,	'Kir ',	'Liqueurs : cassis, mûre, pêche, framboise',	3.50,	1,	'2023-06-08 12:35:09',	NULL,	14),
(8,	'Kir breton',	'Liqueurs disponibles: cassis, mûre, pêche, framboise.',	3.30,	1,	'2023-06-08 12:35:57',	NULL,	14),
(9,	'Ricard',	NULL,	4.00,	1,	'2023-06-08 12:36:19',	NULL,	14),
(10,	'Coca',	NULL,	3.50,	0,	'2023-06-08 12:36:47',	NULL,	7),
(11,	'Ice-tea',	'Pêche',	3.50,	0,	'2023-06-08 12:37:21',	NULL,	7),
(12,	'Orangina',	NULL,	3.50,	0,	'2023-06-08 12:37:46',	NULL,	7),
(13,	'Sirop à l\'eau',	'Sirops : menthe, grenadine, citron, pêche, fraise.',	2.50,	0,	'2023-06-08 12:38:22',	NULL,	7),
(14,	'Diabolo',	'Sirops : menthe, grenadine, citron, pêche, fraise.',	3.50,	0,	'2023-06-08 12:38:47',	NULL,	7),
(15,	'Vittel',	'100 cl, minérale.',	4.50,	0,	'2023-06-08 12:39:47',	NULL,	13),
(16,	'San Pellegrino',	'Eau pétillante, 100 cl.',	4.50,	0,	'2023-06-08 12:40:26',	NULL,	13),
(17,	'Americano',	'Martini blanc, martini rouge, campari.',	5.50,	1,	'2023-06-08 12:41:17',	NULL,	8),
(18,	'Mojito',	NULL,	6.00,	1,	'2023-06-08 12:41:38',	NULL,	8),
(19,	'Mojito sans alcool',	NULL,	5.50,	0,	'2023-06-08 12:41:54',	NULL,	8),
(20,	'Get 27',	NULL,	5.50,	1,	'2023-06-08 12:42:38',	NULL,	15),
(21,	'Liqueur de poire',	NULL,	5.50,	1,	'2023-06-08 12:42:59',	NULL,	15),
(22,	'Café',	NULL,	2.30,	0,	'2023-06-08 12:43:23',	NULL,	16),
(23,	'Thé ou infusion',	'Thé vert à la menthe, thé Earl Grey, Verveine, Camomille, Tilleul...',	2.80,	0,	'2023-06-08 12:44:13',	NULL,	16);

INSERT INTO `eat` (`id`, `name`, `description`, `price`, `vegan`, `gluten_free`, `created_at`, `updated_at`, `image_id`) VALUES
(1,	'Blanquette de veau',	NULL,	14.00,	0,	0,	'2023-06-08 11:56:01',	NULL,	5),
(2,	'Pizza margharita',	'',	13.00,	0,	0,	'2023-06-08 11:56:31',	NULL,	10),
(3,	'Tartare de saumon',	NULL,	6.00,	0,	1,	'2023-06-08 12:45:26',	NULL,	1),
(5,	'Salade de chèvre chaud',	NULL,	6.00,	0,	1,	'2023-06-08 12:46:25',	NULL,	11),
(6,	'Lasagnes à la bolognaise',	NULL,	10.50,	0,	0,	'2023-06-08 12:47:13',	NULL,	12),
(7,	'Burger végétarien',	'Pain, tomates, salade, fondue d\'oignons, steak végétarien, fromage.',	10.00,	0,	0,	'2023-06-08 12:48:42',	NULL,	13),
(8,	'Ailes de raie aux câpres',	'Servies avec risotto aux courgettes ou purée maison',	13.50,	0,	0,	'2023-06-08 12:49:38',	NULL,	NULL),
(9,	'Saumon sauce au beurre',	'Accompagnement au choix : tagliatelles, riz, frites, salade, risotto.',	16.50,	0,	0,	'2023-06-08 12:51:08',	NULL,	9),
(10,	'Entrecôte ',	'350 gr,\r\nAccompagnement au choix : tagliatelles, riz, frites, salade, risotto.',	18.50,	0,	0,	'2023-06-08 12:52:01',	NULL,	NULL),
(11,	'Poulet rôti aux champignons',	'Accompagnement au choix : tagliatelles, riz, frites, salade, risotto.',	16.50,	0,	0,	'2023-06-08 12:53:52',	NULL,	NULL),
(12,	'Tiramisu',	NULL,	6.50,	0,	0,	'2023-06-08 12:54:18',	NULL,	NULL),
(13,	'Crème brulée',	NULL,	6.50,	0,	0,	'2023-06-08 12:54:41',	NULL,	NULL);

INSERT INTO `eat_category` (`eat_id`, `category_id`) VALUES
(1,	2),
(1,	11);

INSERT INTO `eat_menu` (`eat_id`, `menu_id`) VALUES
(3,	2),
(8,	2),
(9,	2),
(11,	1),
(12,	2);

INSERT INTO `image` (`id`, `name`, `url`, `created_at`, `updated_at`, `restaurant_id`) VALUES
(1,	'tartare de saumon',	'https://unsplash.com/fr/photos/q8YUbWfCRcA',	'2023-06-09 17:23:07',	NULL,	NULL),
(2,	'salle de restau ',	'https://unsplash.com/fr/s/photos/restaurant',	'2023-06-09 17:29:35',	NULL,	2),
(3,	'plat',	'https://picsum.photos/500 ',	'2023-06-09 17:29:58',	NULL,	NULL),
(4,	'restaurant 15',	'https://unsplash.com/fr/photos/H7xTpvBjJS4',	'2023-06-09 17:30:24',	NULL,	2),
(5,	'blanquette de veau',	'https://picsum.photos/500',	'2023-06-12 09:18:23',	NULL,	NULL),
(6,	'restaurant 1',	'https://unsplash.com/fr/photos/yn3tA00iHBg',	'2023-06-12 10:54:37',	NULL,	2),
(7,	'restaurant 3',	'https://unsplash.com/fr/photos/XXigdb3WMmA',	'2023-06-12 10:55:14',	NULL,	2),
(8,	'restaurant 2',	'https://unsplash.com/fr/photos/9plWM7xXApw',	'2023-06-12 10:55:49',	NULL,	2),
(9,	'saumon ',	'https://unsplash.com/fr/photos/t05q7TZObzc',	'2023-06-12 10:56:13',	NULL,	NULL),
(10,	'pizza margarita',	'https://unsplash.com/fr/photos/A9oUGvA4gR8',	'2023-06-12 10:58:22',	NULL,	NULL),
(11,	'salade chèvre ',	'https://unsplash.com/fr/photos/pCxJvSeSB5A',	'2023-06-12 11:01:37',	NULL,	NULL),
(12,	'lasagne',	'https://unsplash.com/fr/photos/PgkGsxjvGB4',	'2023-06-12 11:02:20',	NULL,	NULL),
(13,	'burger végé',	'https://unsplash.com/fr/photos/2WvC5B16uRI',	'2023-06-12 11:02:51',	NULL,	NULL);

INSERT INTO `menu` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1,	'Menu enfant',	15.00,	'2023-06-09 12:24:22',	NULL),
(2,	'Menu Gourmet',	26.00,	'2023-06-09 12:24:54',	NULL);

INSERT INTO `reservation` (`id`, `number_of_covers`, `date`, `time_slots`, `created_at`, `updated_at`, `user_id`) VALUES
(1,	4,	'2023-06-12 21:30:45',	'21:00:00',	'2023-06-12 10:17:29',	'2023-06-12 10:17:29',	1),
(2,	2,	'2023-06-11 21:37:20',	'21:37:20',	'2023-06-11 21:37:20',	NULL,	2),
(4,	4,	'2023-06-12 21:30:45',	'21:00:00',	'2023-06-12 10:18:21',	'2023-06-12 10:18:21',	NULL),
(5,	4,	'2023-06-11 21:30:45',	'21:00:00',	'2023-06-12 10:09:34',	NULL,	NULL);

INSERT INTO `restaurant` (`id`, `history`, `opening_lunch`, `address`, `phone`, `created_at`, `updated_at`, `opening_evening`, `info`) VALUES
(2,	'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident molestiae explicabo praesentium vero nisi quasi odit. Iusto quos beatae, aperiam quibusdam ullam, distinctio laboriosam, culpa blanditiis aspernatur laudantium iste obcaecati quae? Possimus nihil ab quasi et vitae, doloribus error. Dignissimos in, ea libero voluptate eveniet molestias tenetur nulla recusandae ad aliquam ipsam placeat, provident ab soluta distinctio consectetur aperiam labore quidem inventore sed? Eaque molestias cupiditate similique tempore maxime rerum? Nemo possimus unde inventore qui nobis corrupti voluptas reprehenderit quia, quisquam nostrum, aut nulla quo nam? Explicabo, cupiditate maxime nulla in quos exercitationem, excepturi nam perferendis vero laboriosam pariatur molestiae dicta provident vel, architecto voluptatibus consequuntur error veritatis. Magnam molestiae iusto quis nam nesciunt nihil laborum, porro et, earum voluptatem nulla? Beatae iusto sed a! Esse praesentium ea non corrupti ab nulla nostrum nam consectetur! Tempora deleniti labore dolores ipsam repudiandae quaerat porro! Sint incidunt cumque mollitia maxime quas delectus ut deleniti error architecto, sunt porro culpa rerum fugit numquam soluta magnam inventore labore enim est iusto iste sequi aliquid distinctio qui! Vitae, ea officiis tempore quae facere delectus deleniti itaque? Nam maxime qui, ea ullam quibusdam blanditiis eaque alias deleniti labore, dolorem doloribus velit, magni deserunt earum unde nobis recusandae odio totam nulla? Tempora fuga saepe eius doloribus molestiae autem et quo, officia culpa perspiciatis excepturi doloremque, aut corrupti cupiditate illo officiis voluptates similique necessitatibus? Nemo, ullam! Nihil accusantium perferendis quia officia illo, rem pariatur blanditiis sed quisquam omnis veritatis eius quam ad quis doloremque, nemo, totam aut. Sint, nobis eveniet delectus doloribus quisquam similique et officiis voluptates accusantium amet sit consequatur quasi expedita id? Voluptatibus maxime repudiandae tempora inventore temporibus earum magni placeat sequi eius voluptas accusamus, amet itaque natus ut ratione assumenda quod, sapiente hic quo id nam culpa dolor iste! Ut, in repudiandae vitae ipsum temporibus perspiciatis. Iusto quo veritatis similique reiciendis earum quaerat sint voluptas, commodi porro consequatur sed quas nesciunt sapiente iste quam eum fuga at vel. Rerum iure deleniti quidem accusantium ullam sint earum, dolor nulla, aliquam alias ut vitae in ducimus placeat totam non enim quo aut tenetur? Aliquid temporibus, harum numquam qui necessitatibus dolore omnis minus libero. Odio unde dolores earum cumque necessitatibus, sint eos, quibusdam quis tempora placeat enim! Doloribus quasi fugiat ex, itaque perferendis illum! Nobis doloribus repellat laboriosam optio porro repellendus voluptas aliquid reprehenderit id, eligendi nesciunt nam eos repudiandae nulla quia omnis iure! Aliquid, velit exercitationem beatae repellat reprehenderit alias ratione quae incidunt nulla, impedit doloribus itaque suscipit dolorum explicabo hic amet doloremque dolor excepturi, rerum fugiat ullam sequi eum deserunt nobis. Iste beatae labore saepe modi, architecto eius amet nobis quos suscipit fugit assumenda optio at quod ducimus enim voluptatum. Nulla itaque eum consequatur quis. Cupiditate distinctio accusantium perferendis repudiandae asperiores hic maiores consectetur voluptas animi, ipsa mollitia. Error laborum voluptates a dolore, cupiditate sed ipsam aliquid maiores veritatis. Eum nemo distinctio incidunt cupiditate animi modi? Animi pariatur vel repellat, commodi ad dolor corrupti dicta sapiente minima corporis debitis cumque facilis, ducimus, esse autem omnis? Deserunt.\r\n',	'12H00-14H30',	'2 Rue du Marché 50500 BREVANDS',	'02.50.50.51.52',	'2023-06-09 09:27:09',	NULL,	'19H00-22H30',	'Restaurant ouvert tous les jours sauf le lundi');

INSERT INTO `review` (`id`, `comment`, `rating`, `created_at`, `user_id`) VALUES
(1,	'Très joli lieu on y mange très bien',	5,	'2023-06-09 14:21:28',	1),
(2,	'Cuisine exceptionnelle, lieu plein de charme, super accueil !',	5,	'2023-06-09 14:22:50',	2),
(4,	'Très chic',	4.5,	'2023-06-09 14:21:28',	NULL),
(6,	'magnifique, c\'était très bon',	4.5,	'2023-06-12 10:32:41',	NULL);

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1,	'Félix',	'Picot',	'felix.picot@hotmail.fr',	'$2y$13$dyFawJWY/Nu.UfzJGI2mT.nb1niFwGljg.mv6ysGsnXCjYCfFU9hi',	'admin',	'2023-06-09 14:18:54',	NULL),
(2,	'Stéphanie',	'Guilbault',	'stefie.guilbault@gmail.com',	'$2y$13$Wu1sZ2KSibRc4xTyivWo4uyrk1UCOmsRdWPl8mJs1jw2xfbITjzyq',	'admin',	'2023-06-09 14:20:32',	NULL),
(3,	'Bibi',	'Chouette',	'chouette@chouette.fr',	'0000',	'user',	'2023-06-12 15:43:38',	NULL);

-- 2023-06-12 14:40:13