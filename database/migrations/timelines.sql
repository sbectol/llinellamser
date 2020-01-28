/*
Navicat MySQL Data Transfer

Source Server         : Big Bhost
Source Server Version : 50560
Source Host           : localhost:3306
Source Database       : timelines

Target Server Type    : MYSQL
Target Server Version : 50560
File Encoding         : 65001

Date: 2020-01-07 10:11:37
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `timelines`
-- ----------------------------
DROP TABLE IF EXISTS `timelines`;
CREATE TABLE `timelines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dyddiad` int(4) DEFAULT NULL,
  `title` text,
  `title_cym` text,
  `image` varchar(255) DEFAULT NULL,
  `asset` text,
  `asset_cym` text,
  `asset_type` varchar(255) DEFAULT NULL,
  `major_event` tinyint(4) DEFAULT NULL,
  `credit` varchar(255) DEFAULT NULL,
  `disgrifiad` text,
  `quote` varchar(512) DEFAULT NULL,
  `nobg` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=400 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of timelines
-- ----------------------------
INSERT INTO timelines VALUES ('141', '0540', 'At about this time St Crwst arrives in the Conwy Valley', 'Tua’r adeg yma cyrhaeddodd Sant Crwst i Ddyrffyn Conwy', 'grwst.jpg', 'Llanrwst_Eng_SaintGrwst.mp3', 'Llanrwst_Cym_SantGrwst.mp3', 'audio', '0', null, null, null, '0');
INSERT INTO timelines VALUES ('145', '0954', 'At the Battle of Llanrwst, sons of Idwal Foel vs sons of Howel Dda', 'Ym mrwydr Llanrwst, meibion Idwa Foel yn erbyn meibion Hywel Dda', 'Llanrwst_yn_Llosgi.jpg', 'Llanrwst yn Llosgi (Eng Subtitles).mp4', 'Llanrwst yn Llosgi.mp4', 'video', '0', null, null, null, '0');
INSERT INTO timelines VALUES ('146', '1170', 'Welsh Prince Rhun ap Nefydd Hardd donates land to build a church to St Crwst', 'Tywysog Cymru Rhun ap Nefydd Hardd yn rhoi tir i adeiladu eglwys i Sant Crwst', 'IMG_0945.jpg', null, null, 'image', '0', null, null, null, '0');
INSERT INTO timelines VALUES ('147', '1247', 'Local traditional saying Cymru, Lloegr a Llanrwst dates from this time', 'Dywediad traddodiadol Cymru, Lloegr a Llanrwst yn dyddio’n ol i’r cyfnod yma', 'llythyr-papur.jpg', '', null, 'text', '0', '', '', 'Cymru, Lloegr a Llanrwst!', '0');
INSERT INTO timelines VALUES ('148', '1400', 'Owain Glyndwr - Llanrwst laid waste', 'Owain Glyndwr - Llanrwst wedi’i anialu', 'Tarian_Glyndwr_Arfbais_PNG.jpg', null, null, 'image', '0', null, null, null, '1');
INSERT INTO timelines VALUES ('149', '1415', 'Hywel Coetmor leads a 100 Denbighshire men at the Battle of Agincourt', 'Hywel Coetmor yn arwain 100 o ddynion sir Ddinbych i frwydr ‘Agincourt’', 'hywel_coetmor.jpg', '1914_1.mp3', null, 'image', '0', null, null, null, '0');
INSERT INTO timelines VALUES ('150', '1470', 'Following the Yorkist attack 2 years previously, Llanrwst begins rebulding', 'Yn dilyn yr ymosodiad 2 flynedd yn gynharach, mae Llanrwst yn cychwyn ail adeiladu', 'yorkists.jpg', '', null, 'image', '0', '', '', '', '1');
INSERT INTO timelines VALUES ('151', '1483', 'Gwydir Castle is now in the hands of the Wynn family', 'Castell Gwydir nawr yng ofal teulu’r Wynniaid. ', '01_Gwydir_Castle.jpg', 'Llanrwst_Eng_GwydirCastle.mp3', 'Llanrwst_Cym_CastellGwydir.mp3', 'audio', '0', 'Waterborough', null, null, '0');
INSERT INTO timelines VALUES ('152', '1536', 'The Monastic house, Maenan Abbey is ordered to close. The monks refuse to leave', 'Y ty mynachaidd yn cael gorchymyn i gau. Y mynaich yn gwrthod gadael', '800px-MaenanAbbey.jpg', null, null, 'image', '0', null, null, null, '0');
INSERT INTO timelines VALUES ('154', '1551', 'John Wynn ap Maredudd is elected as MP for Caernarvonshire', 'John Wynn ap Maredudd yn cael ei ethol yn AS dros sir Gaernarfon', 'llythyr-papur.jpg', 'Llanrwst_Eng_TheWynnFamily.mp3', 'Llanrwst_Cym_TeulurWynniaid.mp3', 'audio', '0', null, null, null, '1');
INSERT INTO timelines VALUES ('155', '1553', 'John Wynn of Gwydir is born', 'Ganwyd John Wynn o Wydir', 'Sir_John_Wynne_02424.jpg', null, null, 'image', '0', null, null, null, '0');
INSERT INTO timelines VALUES ('156', '1559', 'John Wynn ap Maredudd\'s will mentions bridge at Llanrwst in need of repair', 'Noder yn ewyllus John Wynn ap Maredudd fod pont Llanrwst angen gwelliannau', 'HistoryoftheBridge.jpg', 'Llanrwst_Eng_HistoryOfTheBridge.mp3', 'Llanrwst_Cym_HanesYBont.mp3', 'audio', '0', null, null, null, '0');
INSERT INTO timelines VALUES ('157', '1567', 'William Salusbury completed his translation of the New Testament into Welsh', 'Cwblhaodd William Salusbury gyfieithu’r testament newydd i’r Gymraeg', 'Salusbury.jpg', 'Llanrwst_Eng_WilliamSalesbury.mp3', 'Llanrwst_Cym_WilliamSalesbury.mp3', 'audio', '0', null, null, null, '0');
INSERT INTO timelines VALUES ('158', '1584', 'William Salusbury dies at Plas Isa', 'Bu farw Williams Salusbury ym Mhlas Isa', 'Plas_Isa_01(dg).jpg', null, null, 'image', '0', null, null, null, '0');
INSERT INTO timelines VALUES ('159', '1586', 'William Camden visits a \\\"town ill built, famous for it\'s harp makers\\\"', 'Williams Camden yn ymweld â “tref sydd wedi ei hadeiladu yn wael, ac yn enwog am wneuthurwyr telyn”', 'llythyr-papur.jpg', 'Llanrwst_Eng_Harpists.mp3', 'Llanrwst_Cym_GwneuthurwyrTelynnau.mp3', 'audio', '0', null, null, null, '0');
INSERT INTO timelines VALUES ('349', '1597', 'Documents record a Union Inn at  Llanrwst, Sir John Wynn repairs his tannery ', 'Dogfennau yn nodi fod ‘Union Inn’ yn Llanrwst, Mae Syr John Wynn yn atgyweirio ei dannerdy', 'llythyr-papur.jpg', ' ', null, 'text', '0', null, null, null, '0');
INSERT INTO timelines VALUES ('160', '1588', 'At the time of the Armada crisis Sir John Wynn is high sheriff of Caernarvonshire', 'Yng nghyfnod argyfwng Armada, mae Syr John Wynn yn cael ei wneud yn Uwch Siryf Sir Gaernarfon', 'John_Wynn_portrait_History_of_the_Gwydir_family.jpg', null, null, 'image', '0', null, null, null, '0');
INSERT INTO timelines VALUES ('350', '1603', 'John Wynn gains membership of the council of the Marches', 'John Wynn yn cael aelodaeth yng nghyngor y gorymdeithiau', 'llythyr-papur.jpg', null, null, 'text', '0', null, null, null, '0');
INSERT INTO timelines VALUES ('351', '1606', 'John Wynn is knighted by King James I', 'John Wynn yn cael ei urddo’n farchog gan y Brenin James 1af ', 'James_I_of_England_by_Daniel_Mytens.jpg', null, null, 'image', '0', null, null, null, '0');
INSERT INTO timelines VALUES ('352', '1607', 'The Gwydir estate begins speculating in ore mining in the Gwydir Forest', 'Stad Gwydir yn cychwyn edrych ar fwyngloddio mwyn yng nghoedwig Gwydir', '13875813865_d0da0ddf78_k.jpg', null, null, 'image', '0', null, null, null, '0');
INSERT INTO timelines VALUES ('353', '1608', 'Sir John Wynn begins construction of a new Grammar school', 'Syr John Wynn yn cychwyn adeiladu ysgol ramadeg newydd yn Llanrwst', 'llythyr-papur.jpg', null, null, 'text', '0', null, null, null, '0');
INSERT INTO timelines VALUES ('354', '1610', 'Sir John Wynn is presented with the sword of King James', 'Cyflwynwyd cleddyf Brenin James y 1af i Syr John Wynn', 'fear-of-james-i-king-of-england-for-a-sword-litz-collection.jpg', null, null, 'image', '0', null, null, null, '0');
INSERT INTO timelines VALUES ('355', '1610', 'Construction begins on the Almshouses in Church street', 'Cychwyn adeiladu’r elusendai ar stryd yr Eglwys', '2626664_176336d8.jpg', 'Llanrwst_Eng_HistoryOfTheAlmshouses.mp3', 'Llanrwst_Cym_HanesYrElusendai.mp3', 'audio', '0', null, null, null, '0');
INSERT INTO timelines VALUES ('356', '1611', 'Sir John Wynn is granted Baronetcy', 'Syr John Wynn yn cael barwnigaeth', 'llythyr-papur.jpg', null, null, 'text', '0', null, null, null, '0');
INSERT INTO timelines VALUES ('357', '1612', 'Porpoise are sighted in the River Conwy', 'Gwelwyd Llamhidydd yn yr Afon Conwy', 'llythyr-papur.jpg', null, null, 'text', '0', null, null, null, '0');
INSERT INTO timelines VALUES ('358', '1622', 'Economic decline and recession take their toll on the Gwydir Estate', 'Economic decline and recession take their toll on the Gwydir Estate', 'llythyr-papur.jpg', null, null, 'text', null, null, null, null, null);
INSERT INTO timelines VALUES ('359', '1625', 'Llanrwst bridge is presented as ruinous at the Sessions in Denbigh', 'Llanrwst bridge is presented as ruinous at the Sessions in Denbigh', 'llythyr-papur.jpg', null, null, 'text', null, null, null, null, null);
INSERT INTO timelines VALUES ('360', '1627', 'Sir John Wynn of Gwydir dies', 'Bu farw Syr John Wynn o Wydir', 'llythyr-papur.jpg', null, null, 'text', null, null, null, null, null);
INSERT INTO timelines VALUES ('361', '1632', 'Sir Owen Wynn reports Llanrwst bridge to the Great Sessions as a ruin', 'Dywedodd Syr Owen Wynn wrth y ‘Great Sessions’ fod pont Llanrwst yn adfail', 'llythyr-papur.jpg', null, null, 'text', null, null, null, null, null);
INSERT INTO timelines VALUES ('362', '1633', 'Construction begins on the Wynn Chapel adjoining St Grwst parish church', 'Dechreuwyd gwaith ar gapel yr Wynniaid sydd yn ffinio gyda Eglwys St Crwst', 'llythyr-papur.jpg', 'Llanrwst_Eng_HistoryOfTheChapel.mp3', 'Llanrwst_Cym_HanesYCapel.mp3', 'audio', null, null, null, null, null);
INSERT INTO timelines VALUES ('363', '1636', 'Pont Fawr is constructed as a cost of £1,000', 'Adeiladwyd Pont Llanrwst am £1,000', 'ConstructionDetails.jpg', null, null, 'text', null, null, null, null, null);
INSERT INTO timelines VALUES ('364', '1642', 'Parliamentarian forces secure the bridge', 'Byddin y seneddwyr yn gwarchod y bont', 'llythyr-papur.jpg', null, null, 'text', null, null, null, null, null);
INSERT INTO timelines VALUES ('365', '1646', 'Royalist march from Denbigh securing the bridgehead of Llanrwst', 'Royalist march from Denbigh securing the bridgehead of Llanrwst', 'llythyr-papur.jpg', null, null, 'text', null, null, null, null, null);
INSERT INTO timelines VALUES ('366', '1661', 'Town hall is built by the Wynn family', 'Adeiladwyd neuadd y dref gan deulu’r Wynniaid', 'llythyr-papur.jpg', null, null, 'text', null, null, null, null, null);
INSERT INTO timelines VALUES ('367', '1666', 'Sir Richard Wynn comments that Llanrwst has many “rotten pavements”', 'Dywedodd Syr Richard Wynn fod gan Lanrwst lawer o “balmentydd gwael”', 'llythyr-papur.jpg', null, null, 'text', null, null, null, null, null);
INSERT INTO timelines VALUES ('368', '1673', 'Gwydir Uchaf chapel is built by the Wynn’s', 'Adeiladwyd Capel Gwydir Uchaf gan y Wynniaid', 'llythyr-papur.jpg', null, null, 'text', null, null, null, null, null);
INSERT INTO timelines VALUES ('369', '1675', 'Arch collapses on the Llanrwst Bridge', 'Bwa Pont Llanrwst yn dymchwel', '900px-Llanroost_bridge_over_the_river_Conway_in_north_Wales.jpg', null, null, 'image', null, null, null, null, null);
INSERT INTO timelines VALUES ('370', '1678', 'Mary Wynn marries Robert Bertie, Earl of Lindsey at Westminster Abbey', 'Priododd Mary Wynn Dug Lindsey sef Robert Bertie', 'Dukeancaster.jpg', null, null, 'image', null, null, null, null, null);
INSERT INTO timelines VALUES ('371', '1698', 'Population of Llanrwst stands at 300, with some 60 houses', 'Poblogaeth Llanrwst yn 300 gyda thua 60 o dai', 'llythyr-papur.jpg', null, null, 'text', null, null, null, null, null);
INSERT INTO timelines VALUES ('372', '1703', 'Arch collapses on Llanrwst Bridge', 'Bwa Pont Llanrwst yn dymchwel', '900px-Llanroost_bridge_over_the_river_Conway_in_north_Wales.jpg', null, null, 'image', null, null, null, null, null);
INSERT INTO timelines VALUES ('373', '1711', 'Future harpist to the Royal family, John Richard is born in the King’s head', 'Ganwyd y telynor John Richards yn y King’s Head. Ef oedd telynor y teulu Brenhinol ar un cyfnod', 'llythyr-papur.jpg', null, null, 'text', null, null, null, null, null);
INSERT INTO timelines VALUES ('374', '1734', 'Plas Isa serves its connection with the Salusbury family', 'Cysylltiad Plas Isa gyda theulu’r Salusbury', 'Plas_Isa_01(dg).jpg', null, null, 'image', null, null, null, null, null);
INSERT INTO timelines VALUES ('375', '1739', 'Church officials complain that hides are being suspended from the yew trees', 'Swyddogion yr Eglwys yn cwyno fod crwyn yn cael eu hongian o’r coed yw', 'llythyr-papur.jpg', null, null, 'text', null, null, null, null, null);
INSERT INTO timelines VALUES ('376', '1740', 'An outbreak of typhus occurs at this time and people are dying in droves', 'Daw teiffws yn amlwg yn ystod y cyfnod hwn gyda phobl yn marw yn llu', 'llythyr-papur.jpg', null, null, 'text', null, null, null, null, null);
INSERT INTO timelines VALUES ('377', '1756', 'A 35ft long ship, the hopewell is built by shipwright Robert Roberts', 'Adeiladwyd llong 35 troedfedd o hyd o’r enw hopewell gan y saer llongau Robert Roberts', 'llythyr-papur.jpg', null, null, 'text', null, null, null, null, null);
INSERT INTO timelines VALUES ('378', '1757', 'The tower of the Town hall is replaced by a cupola and weather vane', 'Cafodd tŵr Neuadd y Dref ei gyfnewid am gromen a cheiliog y gwynt', 'llythyr-papur.jpg', null, null, 'text', null, null, null, null, null);
INSERT INTO timelines VALUES ('379', '1761', 'Town Hall clock is installed', 'Cloc yn cael ei osod ar Neuadd y Dref', 'llythyr-papur.jpg', null, null, 'text', null, null, null, null, null);
INSERT INTO timelines VALUES ('380', '1773', 'The cupola, bell and weather vane are blown down in a severe storm', 'Mae storm ddifrifol yn chwythu’r gromen, y gloch a’r ceiliog y gwynt i ffwrdd', 'llythyr-papur.jpg', null, null, 'text', null, null, null, null, null);
INSERT INTO timelines VALUES ('381', '1777', 'Turnpike roads reach Llanrwst', 'Ffyrdd tyrpeg yn dod i Lanrwst', 'llythyr-papur.jpg', null, null, 'text', null, null, null, null, null);
INSERT INTO timelines VALUES ('382', '1781', 'The 1st Battalion of the Denbighshire militia are garrisoned at Llanrwst', 'Bataliwn 1af byddin Sir Ddinbych yn rhoi garsiwn yn Llanrwst', 'llythyr-papur.jpg', null, null, 'text', null, null, null, null, null);
INSERT INTO timelines VALUES ('383', '1791', 'The Owen family begin their long association with clockmaking in the town', 'Teulu’r Owen yn dechrau ar eu cysylltiad hir gyda gwneud clociau yn y dref', 'llythyr-papur.jpg', null, null, 'text', null, null, null, null, null);
INSERT INTO timelines VALUES ('384', '1801', 'The population of Llanrwst is almost 2,000, exceeding Cardiff and Conwy', 'Poblogaeth Llanrwst yn bron i 2,000, oedd yn fwy na phoblogaeth Caerdydd a Chonwy', 'llythyr-papur.jpg', null, null, 'text', null, null, null, null, null);
INSERT INTO timelines VALUES ('385', '1801', 'Capel Seion is founded, although no chapel is yet built', 'Capel Seion is founded, although no chapel is yet built', 'llythyr-papur.jpg', null, null, 'text', null, null, null, null, null);
INSERT INTO timelines VALUES ('386', '1803', 'Fees are levied at the Grammar School for the first time', 'Codwyd tâl yn yr Ysgol Ramadeg am y tro cyntaf ', 'oldschool1.jpg', null, null, 'image', null, null, null, null, null);
INSERT INTO timelines VALUES ('387', '1804', 'The Baptist Church builds the first chapel in Llanrwst, now the Guide hall', 'Eglwys y Bedyddwyr yn adeiladu’r capel cyntaf yn Llanrwst - bellach Neuadd y Geidiau', 'llythyr-papur.jpg', null, null, 'text', null, null, null, null, null);
INSERT INTO timelines VALUES ('388', '1812', 'An archway is created from Church st, depriving the Almshouses of one room', 'Cafodd porth bwaog ei greu o Stryd yr Eglwys, gan dynnu un ystafell oddi ar yr Elusendai', '2626664_176336d8.jpg', null, null, 'image', null, null, null, null, null);
INSERT INTO timelines VALUES ('389', '1819', 'Scientist Michael Faraday visits Llanrwst and goes coracling on the River Conwy', 'Michael Faraday, y gwyddonydd, yn ymweld â Llanrwst ac yn mynd i gwrwglu ar afon Conwy', '800px-Faraday_Cochran_Pickersgill.jpg', null, null, 'image', null, null, null, null, null);
INSERT INTO timelines VALUES ('390', '1820', 'Almshouses are closed due to mismanagment and misappropriation of funds', 'Yr Elusendai yn cau oherwydd camreoli a chamddefnyddio’r cronfeydd ariannol', '2626664_176336d8.jpg', null, null, 'image', null, null, null, null, null);
INSERT INTO timelines VALUES ('391', '1828', 'The Grammar school is re-opened', 'Ail agor yr Ysgol Ramadeg', 'oldschool1.jpg', null, null, 'image', null, null, null, null, null);
INSERT INTO timelines VALUES ('392', '1830', 'Poet and bard Trebor Mai is born', 'Ganwyd y bardd Trebor Mai', 'Robert_Williams_(Trebor_Mai,_1830-77)_(1867)_NLW3362211.jpg', null, null, 'image', null, null, null, null, null);
INSERT INTO timelines VALUES ('393', '1831', 'Population of Llanrwst now stands at 3,601 individuals', 'Poblogaeth Llanrwst bellach yn 3,601 o unigolion', 'llythyr-papur.jpg', null, null, 'text', null, null, null, null, null);
INSERT INTO timelines VALUES ('394', '1836', 'Manchester house is home of John Jones’ Venodocian press until 1935', 'Tŷ Manceinion yn gartref i wasg Wyneddig John Jones tan 1935', 'llythyr-papur.jpg', null, null, 'text', null, null, null, null, null);
INSERT INTO timelines VALUES ('395', '1839', 'Dr. O O Roberts takes Lord Willoughby de Eresby to court for neglect of the Charity', 'Dr. O O Roberts yn mynd â’r Arglwydd Willoughby de Eresby i’r Llys am esgeuluso’r elusen', 'llythyr-papur.jpg', null, null, 'text', null, null, null, null, null);
INSERT INTO timelines VALUES ('396', '1841', 'St Mary’s Church is erected on land fiven by Lord Willoughby de Eresby', 'Codwyd Eglwys y Santes Fair ar dir a roddwyd gan Arglwydd Willoughby de Eresby', '4688498719_f3ae8fbe0a_z.jpg', null, null, 'image', null, null, null, null, null);
INSERT INTO timelines VALUES ('397', '1842', 'St Mary\'s is consecrated by the Bishop of St Asaph', 'Cysegrwyd Eglwys y Santes Fair gan Esgob Llanelwy', '4688498719_f3ae8fbe0a_z.jpg', null, null, 'image', null, null, null, null, null);
INSERT INTO timelines VALUES ('398', '1843', 'Dr O O Roberts wins his case againsy Lord Willoughby de Eresby', 'Dr O O Roberts yn ennill ei achos yn erbyn yr Arglwydd Willoughby de Eresby	', 'llythyr-papur.jpg', null, null, 'text', null, null, null, null, null);
INSERT INTO timelines VALUES ('399', '1846', 'The National School is erected', 'Codwyd yr Ysgol Genedlaethol', 'llythyr-papur.jpg', null, null, 'text', null, null, null, null, null);
