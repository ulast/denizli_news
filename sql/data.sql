-- --------------------------------------------------------
-- Sunucu:                       127.0.0.1
-- Sunucu versiyonu:             5.6.17 - MySQL Community Server (GPL)
-- Sunucu İşletim Sistemi:       Win64
-- HeidiSQL Sürüm:               9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- times için veritabanı yapısı dökülüyor
CREATE DATABASE IF NOT EXISTS `times` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `times`;


-- tablo yapısı dökülüyor times.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `category_ID` int(11) NOT NULL AUTO_INCREMENT,
  `description` longtext NOT NULL,
  `image` longtext NOT NULL,
  `keywords` longtext NOT NULL,
  `title` longtext NOT NULL,
  `url` longtext NOT NULL,
  PRIMARY KEY (`category_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumping data for table times.categories: ~11 rows (yaklaşık)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`category_ID`, `description`, `image`, `keywords`, `title`, `url`) VALUES
	(1, '', '', '', 'Yaşam', 'yasam'),
	(2, '', '', '', 'Politika', 'politika'),
	(3, '', '', '', 'Ekonomi', 'ekonomi'),
	(4, '', '', '', 'Sağlık', 'saglik'),
	(5, '', '', '', 'Eğitim', 'egitim'),
	(6, '', '', '', 'Turizm', 'turizm'),
	(7, '', '', '', 'Kültür - Sanat', 'kultur-sanat'),
	(8, '', '', '', 'Magazin', 'magazin'),
	(9, '', '', '', 'Spor', 'spor'),
	(10, '', '', '', 'Resmi İlanlar', 'resmi-ilanlar'),
	(11, '', '', '', 'Teknoloji', 'teknoloji');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- tablo yapısı dökülüyor times.news
CREATE TABLE IF NOT EXISTS `news` (
  `news_ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` longtext NOT NULL,
  `content` longtext NOT NULL,
  `url` longtext NOT NULL,
  `source` int(11) NOT NULL,
  `source_link` longtext NOT NULL,
  `keywords` longtext NOT NULL,
  `description` longtext NOT NULL,
  `category` int(11) NOT NULL,
  `image` longtext NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`news_ID`),
  KEY `category` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

-- Dumping data for table times.news: ~3 rows (yaklaşık)
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`news_ID`, `title`, `content`, `url`, `source`, `source_link`, `keywords`, `description`, `category`, `image`, `date_time`) VALUES
	(67, 'YENİ MÜDÜRE ZİYARET', 'DENİZLİ İL SAĞLIK MÜDÜRLÜĞÜNE ATANAN Dr. ŞÜKRÜ ARPACI&#8217;ya HAYIRLI OLSUN ZİYARETİNDE BULUNDULAR. Denizli İl Sağlık Müdürü Dr. Şükrü ARPACI’ya göreve yeni atanmasından dolayı Halk Sağlığı Müdürü Dr. Veli KILIÇARSLAN, Halk Sağlığı Müdür Yardımcısı Mehmet BURDURLU ve Denizli Kamu Hastaneler Birliği Genel Sekreteri Uzm. Dr. Berna ÖZTÜRK Tıbbi Hizmetler Başkanı Op. Dr. İbrahim EKİZ makamında ziyaret ederek hayırlı olsun dileklerini ilettiler. Sağlık Müdürü Dr. Şükrü Arpacı, bu nazik ziyaretlerinden dolayı hepsine ayrı ayrı teşekkür etti. ', 'yeni-mudure-ziyaret', 4, 'http://www.denizlikulvargazetesi.net/yeni-mudure-ziyaret', 'YENİ,MÜDÜRE,ZİYARET', 'DENİZLİ İL SAĞLIK MÜDÜRLÜĞÜNE ATANAN Dr. ŞÜKRÜ ARPACI&#8217;ya HAYIRLI OLSUN ZİYARETİNDE BULUNDULAR. Denizli İl Sağlık Müdürü Dr. Şükrü ARPACI’ya göreve yeni atanmasından dolayı Halk Sağlığı Müdürü Dr. Veli KILIÇARSLAN, Halk Sağlığı Müdür Yardımcısı Mehmet BURDURLU ve Denizli Kamu Hastaneler Birliği Genel Sekreteri Uzm. Dr. Berna ÖZTÜRK Tıbbi Hizmetler Başkanı Op. Dr. İbrahim EKİZ makamında ziyaret [...]', 1, 'il-saglik1111.jpg', '2015-01-11 16:22:49'),
	(68, 'DENİZLİ ÜLKE GÜNDEMİNDE OLACAK', 'Siyasette bölgenin kalbi Denizli’de atacak Denizli AK Parti İl Başkanlığı önce Teşkilat Başkanlığının bölge toplantısı ardından 6. Seçim İşleri Bölge toplantısı ve bu kez de Yerel Yönetimler Bölge toplantısına ev sahipliği yapmaya hazırlanıyor. Toplantıya 13 ilin il, ilçe be belde tüm belediye başkanları, 2 bakan ve 4 bakan yardımcısı çok sayıda milletvekili katılacak. Geçtiğimiz hafta 4 ilden yaklaşık 400 kişinin katılımı ile Adalet ve Kalkınma Partisi’nin 6. Seçim İşleri Bölge Toplantısına ev sahipliği yapan Denizli, 10 Ocak 2015 Cumartesi günü yine çok büyük bir organizasyona daha imza atmaya hazırlanıyor. 2 bakan,6 milletvekilinin katılımlarıyla gerçekleşecek AK Parti 2. Bölge Belediye Başkanları Toplantısı öncesinde konuşan AK Parti Denizli İl Başkanı Avni Örki, “AK Parti Yerel Yönetimler Başkanlığı olarak, çalışmaların verimliliğini ve etkinliğini artırmak, belediyelerimiz arasında bilgi ve tecrübe paylaşımını sağlamak, yerel yönetim çalışmalarımızın usul ve esaslara uygunluğunu temin etmek ve medeniyet tasavvurumuza dayalı şehircilik anlayışımızı paylaşmak amacıyla yerel yönetimler bölge toplantısı gerçekleştirilecektir” dedi. DENİZLİ YİNE ÜLKE GÜNDEMİNDE OLACAK Toplantının önemine vurgu yapan Örki, “Denizli, siyaset sahnesinde çok önemli gelişmeler kaydetmeye devam ediyor. Birbiri ardına büyük organizasyonlarda Denizli’nin isminin geçmesi ilimiz ve bölgemiz açısından son derece önemlidir. AK Parti Yerel Yönetimler Başkanlığı’nın öncülüğünde gerçekleşecek toplantının Denizlimize, bölgemize ve ülkemize hayırlar getirmesini temenni ediyorum. Cumartesi günü Denizli yine ülke gündemindeki yerini alacaktır. Toplantımız üst düzey katılımla gerçekleşecek. Bu da Denizli açısından son derece önemli bir gelişmedir. Bakanımız Sayın Nihat Zeybekci’nin işaret ettiği gibi siyasette lider kent olma yolunda emin adımlarla ilerliyoruz.” dedi. DÜNYA KENTİ DENİZLİ BELEDİYE BAŞKANLARINI AĞIRLIYOR. ‘Dünya kenti Denizli’nin bu tarz bölgesel toplantılara ev sahipliği yapması çok önemlidir’ diyerek sözlerini sürdüren Örki, “ Bu toplantılar şehrimizin marka değerinin artırılmasına ciddi katkı koymaktadır. Bölgemizde bulunan bütün Ak Parti’li belediye başkanlarını, bakanlarımızı, genel başkan yardımcımızı ve diğer önemli kişileri ilimizde ağırlayacak olmamız bizleri heyecanlandırmakta ve mutlu etmektedir. Bu toplantıda ilimizde gerçekleştirilen bakanımız Nihat Zeybekçi ile başlayan belediyecilik hizmetleri ile yazdığımız hizmet destanlarını da katılımcılara tecrübe paylaşımı şeklinde anlatacağız” şeklinde konuştu. 12 İL DENİZLİ’YE GELECEK Denizli Colossae Thermal Otel’de yapılacak 2. bölge belediye başkanları toplantısının Denizli, Afyon, Antalya, Aydın, Burdur, Isparta, İzmir, Karaman, Konya, Kütahya, Manisa, Muğla ve Uşak illerinin katılımı ile gerçekleşeceğine dikkat çeken Örki, “10 Ocak 2015 tarihinde Denizli Colossae Thermal Otel’de yapılacak toplantımız yine çok ses getirecektir. Toplantımızda il yerel yönetimler başkanları, il gençlik ve kadın kolları yerel yönetimler başkanları, ilçe belediye başkanları, il genel meclis başkanları, büyükşehir belediyesi meclis başkanvekili ile Denizli büyükşehir belediye meclis üyeleri hazır bulunacak” şeklinde konuştu. ÜST DÜZEY KATILIM VAR Toplantıya AK Parti Genel Başkan Yardımcısı ve Yerel Yönetimler Başkanı Abdulhamit Gül, Ekonomi Bakanı Nihat Zeybekçi, Orman ve Su işleri Bakanı Veysel Eroğlu’nun yanı sıra MKYK Üyesi Yerel Yönetimler Başkan Yardımcısı Nazım Maviş, Çevre ve Şehircilik Bakan Yardımcısı Muhammet Balta, Orman ve Su İşleri Bakan Yardımcısı Nurettin Akman, Çalışma ve Sosyal Güvenlik Bakan Yardımcısı Halil Etyemez, Maliye Bakan Yardımcısı Abdullah Erdem Cantimur, Yerel Yönetimler Başkan Yardımcısı Erol Kaya, Teşkilat Başkan Yardımcısı Mustafa Baloğlu, Yerel Yönetimler Başkan Yardımcısı Denizli Milletvekili Bilal Uçar da katılacak. PROGRAM Tarih ve Saat: 10.01.2015-Cumartesi-11:00 Yer : Denizli Colossae Termal Otel Katılımcılar : Büyükşehir ve İl Belediye Başkanları, İl yerel yönetimler başkanları, İl Gençlik ve Kadın kolları Yerel Yönetimler Başkanları İlçe Belediye Başkanları İl Genel meclis başkanları Büyükşehir Belediyesi Meclis Başkanvekili Toplantının yapıldığı ilin(Denizli) Büyükşehir belediye meclis üyeleri Protokol Katılımcılar Abdulhamit GÜL Genel başkan yrd. ve yerel yönetimler bşk) Nihat ZEYBEKÇİ (Ekonomi Bakanı) Veysel EROĞLU (Orman ve Su işleri Bakanı) Nazım MAVİŞ (MKYK Y.üyesi yerel yönetimler bşk yardmcısı) Muhammet BALTA (Çevre ve Şehircilik Bakan yrd) Nurettin AKMAN (Orman ve Su İşleri Bakan Yrd) Halil ETYEMEZ(Çalışma ve Sosyal Güvenlik Bakan Yrd) Abdullah Erdem CANTİMUR(Maliye Bakan Yrd) Erol Kaya (Yerel Yöntmler Bşk Yrd) Mustafa BALOĞLU (Teşkilat Başk yrd) Bilal Uçar (Yerel Yönetimler Bşk yrd,Denizli Milletvekili) ', 'denizli-ulke-gundeminde-olacak', 4, 'http://www.denizlikulvargazetesi.net/denizli-ulke-gundeminde-olacak', 'DENİZLİ,ÜLKE,GÜNDEMİNDE,OLACAK', 'Siyasette bölgenin kalbi Denizli’de atacak Denizli AK Parti İl Başkanlığı önce Teşkilat Başkanlığının bölge toplantısı ardından 6. Seçim İşleri Bölge toplantısı ve bu kez de Yerel Yönetimler Bölge toplantısına ev sahipliği yapmaya hazırlanıyor. Toplantıya 13 ilin il, ilçe be belde tüm belediye başkanları, 2 bakan ve 4 bakan yardımcısı çok sayıda milletvekili katılacak. Geçtiğimiz hafta [...]', 1, 'avni-orki.jpg', '2015-01-11 13:57:42'),
	(69, 'BEDAVA TASARIMCI', 'TASARIM YAPMAK İSTEYENE TASARIMCI BEDAVA &nbsp; 2023 yılı için koyulan 500 Milyar Dolarlık ihracat hedefi için sanayicilere yönelik yapılan mevzuat düzenlemelerine bir yenisi daha eklendi. Ekonomi Bakanı Nihat Zeybekci’nin geçtiğimiz Temmuz ayında gerçekleştirilen Denizli Sanayici ve İş Adamları Platformu’nda ilk defa dile getirdiği tebliğ, yeniden düzenlenerek  21 Aralık 2014 tarihinde yayımlanarak yürürlüğe girdi. Özellikle tekstil sektöründe büyük yankı uyandıran “Tasarım Desteği Hakkında Tebliği” değerlendiren Denizli Sanayi Odası Başkanı Müjdat Keçeci: &nbsp; “Bu tebliğ, Türkiye’de tasarım ve inovasyon kültürünün oluşturulması ve yaygınlaştırılmasını teminen tasarımcı şirketleri/tasarım ofisleri ve işbirliği kuruluşlarının gerçekleştireceği tanıtım, reklam, pazarlama, istihdam, danışmanlık harcamaları, yurt dışında açacakları birimlere ilişkin giderleri ile şirketlerin yurtdışı pazarlara yönelik yüksek katma değerli ürün geliştirmek amacıyla yürütecekleri tasarım ve ürün geliştirme projelerine desteklemek amacıyla hazırlanmıştır. &nbsp; Düzenlenen tebliğde, firmaların destek alabilecekleri tanıtım harcamaları ve danışmanlıklar detaylandırılmıştır. Bu sayede yurt dışında tasarım ofisi veya şirketi açacak firmalarımıza, bu ofis ve şirketlerinin kurulumu, kira giderleri, buralarda çalışacak tasarımcı ve modelistlerin maaş giderleri ve alacakları danışmanlık hizmetleri için 4 yıl boyunca yıllık 1.000.000 $ civarında destek verilebilecektir.” dedi &nbsp; Tebliğin getirmiş olduğu en büyük yenilik ise destek kapsamına alınacak olan tasarım ve ürün geliştirme projelerinde şirketlerin çalıştıracakları tasarımcı ve modelistlerin toplam 1 milyon dolara kadar olan brüt maaşlarının karşılanacak olması. İstihdam desteği yanında,  aynı proje kapsamında kullanılacak techizat ve malzemeler için maksimum 250 bin dolar teşvik verilecek, ayrıca seyahat ve web sayfası üyeliğine dair masrafların da 150 bin doları karşılanacak. İstihdam desteğinin önemine vurgu yapan Keçeci, “Tebliğ sayesinde kaynak yokluğu nedeniyle tasarımcı istihdam edemeyen firmaların uluslararası tasarımcı, modelist ve mühendisleri bünyelerinde çalıştırabilmelerinin önü açılıyor. Sanayicilerimizin bu konuda genç yeteneklerimize fırsat vereceğini düşünüyorum. Tüm bu değişiklikler sayesinde sanayicimiz arzu ettiği katma değeri yüksek ürünleri üretme ve ihracatımızı arttırma şansı olacaktır.” şeklinde konuştu. ', 'bedava-tasarimci', 4, 'http://www.denizlikulvargazetesi.net/bedava-tasarimci', 'BEDAVA,TASARIMCI', 'TASARIM YAPMAK İSTEYENE TASARIMCI BEDAVA &#160; 2023 yılı için koyulan 500 Milyar Dolarlık ihracat hedefi için sanayicilere yönelik yapılan mevzuat düzenlemelerine bir yenisi daha eklendi. Ekonomi Bakanı Nihat Zeybekci’nin geçtiğimiz Temmuz ayında gerçekleştirilen Denizli Sanayici ve İş Adamları Platformu’nda ilk defa dile getirdiği tebliğ, yeniden düzenlenerek  21 Aralık 2014 tarihinde yayımlanarak yürürlüğe girdi. Özellikle tekstil [...]', 1, 'kececi1111.jpg', '2015-01-11 13:49:09');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;


-- tablo yapısı dökülüyor times.pages
CREATE TABLE IF NOT EXISTS `pages` (
  `page_ID` int(11) NOT NULL AUTO_INCREMENT,
  `parent_ID` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `content` longtext NOT NULL,
  `url` longtext NOT NULL,
  `keywords` longtext NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`page_ID`),
  KEY `parent_ID` (`parent_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table times.pages: ~0 rows (yaklaşık)
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;


-- tablo yapısı dökülüyor times.sources
CREATE TABLE IF NOT EXISTS `sources` (
  `source_ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext NOT NULL,
  `url` longtext NOT NULL,
  `slug` longtext NOT NULL,
  `logo` longtext NOT NULL,
  `last_insert` datetime NOT NULL,
  PRIMARY KEY (`source_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table times.sources: ~6 rows (yaklaşık)
/*!40000 ALTER TABLE `sources` DISABLE KEYS */;
INSERT INTO `sources` (`source_ID`, `name`, `url`, `slug`, `logo`, `last_insert`) VALUES
	(1, 'Deha20', 'http://www.deha20.com', 'deha20', '', '2015-01-09 15:02:40'),
	(2, 'Yüz Haber', 'http://www.yuzhaber.com', 'yuzhaber', '', '2015-01-08 15:51:31'),
	(3, 'Haber Denizli', 'http://www.haberdenizli.com', 'haberdenizli', '', '2015-01-09 12:33:44'),
	(4, 'Kulvar Gazetesi', 'http://www.denizlikulvargazetesi.net', 'denizlikulvar', '', '2015-01-09 15:19:20'),
	(5, 'Denizli Demokrat', 'http://www.denizlidemokrat.com', 'denizlidemokrat', '', '2014-10-30 10:03:09'),
	(6, 'Denizli Güncel', 'http://www.denizliguncel.com', 'denizliguncel', '', '2014-10-30 13:16:47');
/*!40000 ALTER TABLE `sources` ENABLE KEYS */;


-- tablo yapısı dökülüyor times.videos
CREATE TABLE IF NOT EXISTS `videos` (
  `video_ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` longtext NOT NULL,
  `image` longtext NOT NULL,
  `url` longtext NOT NULL,
  PRIMARY KEY (`video_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table times.videos: ~2 rows (yaklaşık)
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` (`video_ID`, `title`, `image`, `url`) VALUES
	(1, 'Denizli Tanıtım Filmi', 'http://i.ytimg.com/vi/X546BBjd6-k/mqdefault.jpg', 'http://www.youtube.com/watch?v=X546BBjd6-k'),
	(2, 'Denizli Trafik Kazaları Mobese Görüntüleri', 'http://i.ytimg.com/vi/M6opn_t4a3o/mqdefault.jpg', 'http://www.youtube.com/watch?v=M6opn_t4a3o');
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
