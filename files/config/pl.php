<?php
	/********************************

	Author: Tymoteusz `Razor Meister` Bartnik

	Contact: battnik90@gmail.com

	Polish Language File

	********************************/

	$language['which'] = 'pl';

	$language['core'][0] = 'TeamSpeak3 bot stworzony przez';
	$language['core'][1] = 'Wersja';
	$language['core'][2] = 'Wczytywanie funkcji';
	$language['core'][3] = 'Wczytywanie pliku konfiguracyjnego';
	$language['core'][4] = 'Wczytywanie klasy TS3 Admin Class';
	$language['core'][5] = 'Pomyślnie wczytano: ';
	$language['core']['plugins'][1] = ' plugin';
	$language['core']['plugins'][2] = ' pluginy';
	$language['core']['plugins'][3] = ' pluginów';
	$language['core']['events'][1] = ' event';
	$language['core']['events'][2] = ' eventy';
	$language['core']['events'][3] = ' eventów';
	$language['core']['commands'][1] = ' komenda';
	$language['core']['commands'][2] = ' komendy';
	$language['core']['commands'][3] = ' komend';
	$language['core']['misconfigured'] = ' został źle skonfigurowany';
	$language['core']['console'] = 'Konsola:';
	$language['core']['database'] = 'Połączono z bazą danych';
	$language['core']['license'] = 'Sprawdzanie poprawności licencji';
	

	$language['logs']['core']['bad_license'] = 'Fałszywa licencja. Twórca został powiadomiony!';
	$language['logs']['core']['error']['database'] = 'XBot nie mógł nawiązać połączenie z bazą danych';
	$language['logs']['core']['error']['file'] = 'Podana funckja, która jest w plikach nie została znaleziona w configu';
	$language['logs']['core']['error']['login'] = 'XBot nie mógł zalogować się do server admin query';
	$language['logs']['core']['error']['port'] = 'XBot nie mógł wejść przez określony port';
	$language['logs']['core']['error']['bot_name'] = 'XBot nie mógł zmienić swojego nicku';
	$language['logs']['core']['error']['default_channel'] = 'XBot nie mógł zmienić kanału';
	$language['logs']['core']['error']['connection_lost'] = 'XBot utracił połączenie serwerem!';
	$language['logs']['core']['error']['connection_lost_db'] = 'XBot utracił połączenie z bazą danych!';
	$language['logs']['core']['error']['live_help'] = 'Nie posiadasz licencji na funkcję LiveHelp!';
	$language['logs']['core']['error']['instance_off'] = 'Ta instancja jest wyłączona!';
	$language['logs']['core']['error']['bad_instance'] = 'Wybrano błędną instancję!';
	$language['logs']['core']['error']['php_module'] = 'Brak potrzebnego pakietu PHP: ';
	
	$language['logs']['database']['created'] = 'Pomyślnie utworzono tabelę: ';
	$language['logs']['database']['cant_created'] = 'Błąd przy tworzeniu tabeli: [TABLE_NAME]. Trzeba wstawić ją ręcznie!';

	$language['logs']['start'] = 'XBot wystartował';
	$language['logs']['cant_connect'] = 'XBot nie mógł nawiązać połączenia z serwerem!';
	$language['logs']['functions'] = 'Wykonywanie funkcji ';

	$language['logs']['groups_security']['ban'] = ' został zbanowany za posiadanie rangi: ';
	$language['logs']['groups_security']['kick'] = ' został zkickowany za posiadanie rangi: ';
	$language['logs']['groups_security']['nothing'] = " został zpoke'owany i pozbawiony rangi: ";	

	$language['function']['error']['api'] = "[hr][center][img]https://i.imgur.com/c2BVGB7.png[/img][/center]\n● [size=13][B]Lista błędów[/B][/size][list][*][size=9][b]Błąd [u]połączenia z API[/u][/size][/list]\n";

	$language['function']['get_vip_channel']['message'] = "Właśnie otrzymałeś kanał [TYPE] o numerze: [NUM]! Gratulujemy!";
	$language['function']['get_vip_channel']['has_channel'] = "Posiadasz już kanał [TYPE]";
	$language['function']['get_vip_channel']['top_desc'] = "Kanał [TYPE] nr: ";
	$language['function']['get_vip_channel']['error_db'] = "Brak połączenia z bazą danych!";
	
	$language['function']['warning_ban']['user_banned'] = "Użytkownik został zbanowany: ";

	$language['function']['twitch_yt']['info'] = "Informacje: ";
	$language['function']['twitch_yt']['playing'] = "Gra w grę: ";
	$language['function']['twitch_yt']['viewers'] = "Oglądających: ";
	$language['function']['twitch_yt']['subs'] = "Subskrybujących: ";
	$language['function']['twitch_yt']['videos'] = "Filmów na kanale: ";
	$language['function']['twitch_yt']['click'] = "[KLIKNIJ]";
	$language['function']['twitch_yt']['streaming'] = "NA ŻYWO";
		
	$language['function']['admins_meetin']['moved'] = " adminów zostało pomyślnie przeniesionych na kanał zebrania.";
	$language['function']['admins_meeting']['information'] = " , pamiętaj o zbliżającym się zebraniu Administracji";

	$language['function']['groups_assigner']['has_rang'] = "Masz już rangę rejestracyjną!";
	$language['function']['groups_assigner']['received_rang'] = "Właśnie otrzymałeś rangę rejestracyjną!";
	$language['function']['groups_assigner']['error'] = "Nie spełniasz wymagań! Musisz spędzić na serwerze minimum:";
	$language['function']['groups_assigner']['min'] = "minut.";

	$language['function']['auto_register']['received_rang'] = "Właśnie otrzymałeś rangę rejestracyjną, gdyż spędziłeś określoną liczbę czasu na serwerze!";

	$language['function']['connect_message']['one_day'] = "dzień";
	$language['function']['connect_message']['2_days'] = "dni";
	$language['function']['connect_message']['other_days'] = "dni";
	$language['function']['connect_message']['one_hour'] = "godzinę";
	$language['function']['connect_message']['2_hours'] = "godziny";
	$language['function']['connect_message']['other_hours'] = "godzin";
	$language['function']['connect_message']['one_minute'] = "minutę";
	$language['function']['connect_message']['2_minutes'] = "minuty";
	$language['function']['connect_message']['other_minutes'] = "minut";
	$language['function']['connect_message']['seconds'] = "sekund";

	$language['function']['host_message'] = "Witaj na [b][SERVER_NAME][/b]\nAktualnie online jest [b][SERVER_ONLINE]/[SERVER_MAX_CLIENTS][/b].\nSerwer działa już [b][SERVER_UPTIME][/b]. \nŻyczymy przyjemnych rozmów!";

	$language['function']['poke_admins']['hi'] = "Witaj";
	$language['function']['poke_admins']['in_this_moment'] = "W tej chwili do twojej dyspozycji jest tyle adminów: ";
	$language['function']['poke_admins']['help'] = "W krótce na pewno ktoś Ci pomoże!";
	$language['function']['poke_admins']['no_admins'] = "Niestety w tej chwili nie ma dostepnego zadnego admina, zapraszamy pozniej";
	$language['function']['poke_admins']['wants_help'] = "oczekuje na twoją pomoc!";
	$language['function']['poke_admins']['on_channel'] = "Na kanale: ";
	$language['function']['poke_admins']['informed'] = "został powiadomiony o Twoim pobycie na tym kanale!";

	$language['function']['admin_list']['on_channel'] = "Kanał: ";
	$language['function']['admin_list']['for'] = "od";
	$language['function']['admin_list']['no_admins'] = "Brak adminów w tej grupie serwerowej"; 

	$language['function']['online_from_server_group'] = "Brak osób w tej grupie serwerowej"; 

	$language['function']['afk_move']['moved'] = "Zostałeś przeniesiony na kanał AFK";
	$language['function']['afk_move']['moved_back'] = "Zostałeś przeniesiony z powrotem na swój kanał";

	$language['function']['nicks_security']['kick_message'] = "Twój nick zawiera złą frazę: ";

	$language['function']['top_connections']['connect'] = "połączeń";

	$language['function']['record_online'][0] = "[b]Informacje - Serwer[/b]\nRekord dostępnych użytkowników";
	$language['function']['record_online'][1] = "Obecny rekord wynosi:";
	$language['function']['record_online'][2] = "Rekord ustanowiono:";

	$language['function']['channels_guard']['private_channel'] = "Kanał prywatny nr: ";
	$language['function']['channels_guard']['empty'] = " [WOLNY]";
	$language['function']['channels_guard']['how_to_get'] = "Aby go otrzymać udaj się na odpowiedni kanał";
	$language['function']['channels_guard']['wrong_name'] = "Zła nazwa kanału!";
	$language['function']['channels_guard']['bad_name'] = "Niedozwolona fraza w nazwie!";
		
	$language['function']['get_private_channel']['hasnt_rang'] = "Nie masz odpowiedniej rangi!";
	$language['function']['get_private_channel']['has_channel'] = "Masz już u nas kanał!";
	$language['function']['get_private_channel']['get_channel'] = "Właśnie otrzymałeś prywatny kanał!";
	$language['function']['get_private_channel']['no_empty'] = "Aktualnie brak wolnych kanałów!";
	$language['function']['get_private_channel']['channel_name'] = "Kanał prywatny - ";
	$language['function']['get_private_channel']['created'] = "Data założenia: ";
	$language['function']['get_private_channel']['sub_channel'] = " Podkanał";
	$language['function']['get_private_channel']['private_channel'] = "Kanał prywatny nr: ";
	$language['function']['get_private_channel']['not_empty'] = " [ZAJĘTY]";
	$language['function']['get_private_channel']['owner'] = "Właściciel: ";
	$language['function']['get_private_channel']['hi'] = "Witaj ";
	$language['function']['get_private_channel']['channel_created'] = "Właśnie stworzyliśmy Ci prywatny kanał nr: ";
	$language['function']['get_private_channel']['default_pass'] = "Domyślne hasło to: 123";
	$language['function']['get_private_channel']['gl&hf'] = 'Życzymy miłych rozmów!';

	$language['function']['empty_channels']['list'] = 'Lista kanałów';
	$language['function']['empty_channels']['free'] = 'Wolne';
	$language['function']['empty_channels']['to_del'] = 'Do usunięcia';
	$language['function']['empty_channels']['days'] = array
	(
		0 => 'Niedziela',
		1 => 'Poniedziałek',
		2 => 'Wtorek',
		3 => 'Środa',
		4 => 'Czwartek',
		5 => 'Piątek',
		6 => 'Sobota',
	);
	$language['function']['empty_channels']['tomorrow'] = "Jutro";

	$language['function']['ban_list'] = array
	(
		'header' => "Wszystkich: ",
		'permament' => "permamentnie",
		'user' => "Osoba",
		'time' => "Czas trwania",
		'reason' => "Powód",
		'invoker' => "Twórca bana",
		'date' => "Dnia",
	);

	$language['function']['status_sinusbot']['in_group'] = 'Botów w grupie';
	$language['function']['status_sinusbot']['is'] = 'jest';
	$language['function']['status_sinusbot']['active'] = 'Aktywny';
	$language['function']['status_sinusbot']['on_channel'] = 'przebywa na';
	$language['function']['status_sinusbot']['for'] = 'od';	

	$language['function']['random_group']['title'] = 'Lista randomowych grup';
	$language['function']['random_group']['owner'] = 'Właśnie dostałeś randomową grupę: ';
	$language['function']['random_group']['on_time'] = 'na czas:';
	$language['function']['random_group']['cong'] = 'Gratulujemy!';
	$language['function']['random_group']['days'] = 'dni';
	$language['function']['random_group']['desc'] = 'wylosował/a rangę:';
	$language['function']['random_group']['day'] = 'dnia';

	$language['function']['write_statistics']['groups'] = '[center][B][size=11][rang_name]:[/B] [size=11][client][/size][/center]\n[b][size=10]Grupy normalne:[/size][/b][left]● [img]http://i.imgur.com/80Z4ZbB.png[/img] W dniu dzisiejszym: [B][today].[/B]\n● [img]http://i.imgur.com/n8rPmWJ.png[/img] W tym tygodniu: [B][weekly].[/B]\n● [img]http://i.imgur.com/RtHhpjF.png[/img] W tym miesiącu: [B][monthly].[/B]\n● [img]http://i.imgur.com/bB82GO3.png[/img]  Ilość wszystkich nadanych grup: [B][total].[/B][/left]\n[b][size=10]Grupy rejestracyjne:[/size][/b][left]  [img]http://i.imgur.com/FzkNey3.png[/img] W dniu dzisiejszym: [B][reg_today].[/B]\n [img]http://i.imgur.com/Jha3T63.png[/img] W tym tygodniu: [B][reg_weekly].[/B]\n [img]http://i.imgur.com/WTnT6ut.png[/img] W tym miesiącu: [B][reg_monthly].[/B]\n [img]http://i.imgur.com/bB82GO3.png[/img]  Ilość wszystkich nadanych grup: [B][reg_total].[/B][/left]';
	$language['function']['write_statistics']['time_spent'] = '[center][B][size=11][rang_name]:[/B] [size=11][client][/size][/center][b][size=10] Spędzony czas: [/size][/b]\n\n[img]http://i.imgur.com/zljuiR9.png[/img] [size=9]W dniu dzisiejszym: [B][today][/B] w tym [B][off_today][/B] jako niedostępny.[/size]\n[img]http://i.imgur.com/JQAg1B6.png[/img] [size=9]W obecnym tygodniu: [B][weekly][/B] w tym [B][off_weekly][/B] jako niedostępny.[/size]\n[img]http://i.imgur.com/ZHo8aRW.png[/img] [size=9]W obecnym miesiącu: [B][monthly][/B] w tym [B][off_monthly][/B] jako niedostępny.[/size]\n[img]http://i.imgur.com/vklICen.png[/img] [size=9]Łączny spędzony czas: [B][total][/B] w tym [B][off_total][/B] jako niedostępny[/size]';

	$language['function']['facebook_posts']['header'] = 'Lista postów z naszego';
	$language['function']['facebook_posts']['written'] = 'Napisany:';

	$language['function']['live_dj'] = "Brak";

	$language['function']['event_records']['success'] = "Zostałeś zapisany pomyślnie!";
	$language['function']['event_records']['failed'] = "Błąd podczas zapisywania. Może znajdujesz się już na liście?";

	$language['function']['top_week_time'] = "do awansu brakuje:";

	$language['function']['levels']['next'] = "Gratulacje! Awansowałeś na poziom: [NAME]. Do następnego levelu brakuje Ci [HOURS] godzin.";
	$language['function']['levels']['last'] = "Gratulacje! Awansowałeś na poziom: [NAME]. Jest to ostatni level!";

	$language['command']['success'] = "Pomyślnie powiadomiono tyle osób: ";
	$language['command']['success_moved'] = "Pomyślnie przeniesiono tyle adminów: ";
	$language['command']['success_bot'] = "|Sukces| Odczekaj kilka sekund na rezultat!";
	$language['command']['result'] = "Rezultat: ";
	$language['command']['suc'] = "Sukces!";
	
	$language['command']['hi'] = "Witaj [NICK]\nDziekuje za korzystanie z mojego bota ~Razor Meister :)";

	$language['command']['class']['not_command'] = 'Aby użyć komendy użyj `!` przed komendą';
	$language['command']['class']['wrong_command'] = 'Nie ma takiej komendy: ';
	$language['command']['class']['not_privileged'] = 'Nie masz uprawnień do użycia komendy: ';
	$language['command']['class']['bad_usage'] = 'Błędne użycie komendy: ';
	$language['command']['class']['bad_instance'] = 'Nie ma takiej instanji: ';

	$language['command']['ch']['has_channel'] = 'Użytkownik posiada już kanał prywatny!';
	$language['command']['ch']['success'] = 'Pomyślnie utworzono kanał prywatny z liczbą podkanałów: ';

	$language['command']['mute']['success'] = 'Pomyślnie nadano rangę osobie: [b][u][NICK][/u][/b] na liczbę sekund: ';

	$language['command']['admin']['no_admin'] = 'Ta osba nie posiada grupy administratora!';
	$language['command']['admin']['no_in_db'] = 'Brak podanej osoby w bazie danych!';
	$language['command']['admin']['info'] = '\n● [b][u]Informacje ogólne:[/u][/b]\n\tNick: [b][nick][/b]\n\tClient database id: [b][dbid][/b]\n\tClient UID: [b][uid][/b]\n\tPołączeń z serwerem: [b][con][/b]\n\tCzas spędzony na serwerze: [b][time_spent][/b]\n\n';
	$language['command']['admin']['info_2'] = '\n● [b][u]Nadane grupy normalne:[/u][/b]\n\tW dniu dzisiejszym: [b][today][/b]\n\tW tym tygodniu: [b][weekly][/b]\n\tW tym miesiącu: [b][monthly][/b]\n\tIlość wszystkich nadanych grup: [b][total][/b]\n\n● [b][u]Nadane grupy rejestracyjne:[/u][/b]\n\tW dniu dzisiejszym: [b][reg_today][/b]\n\tW tym tygodniu: [b][reg_weekly][/b]\n\tW tym miesiącu: [b][reg_monthly][/b]\n\tIlość wszystkich nadanych grup: [b][reg_total][/b]\n\n● [b][u]Spędzony czas:[/u][/b] \n\tW dniu dzisiejszym: [color=green][b][today_time][/b][/color] w tym [color=red][b][off_today][/b][/color] jako niedostępny\n\tW obecnym tygodniu: [color=green][b][weekly_time][/b][/color] w tym [color=red][b][off_weekly][/b][/color] jako niedostępny\n\tW obecnym miesiącu: [color=green][b][monthly_time][/b][/color] w tym [color=red][b][off_monthly][/b][/color] jako niedostępny.\n\tŁączny spędzony czas: [color=green][b][total_time][/b][/color] w tym [color=red][b][off_total][/b][/color] jako niedostępny';

	$language['command']['tpclient']['to_small'] = 'Za krótki nick! Musisz podać przynajmniej 3 znaki!';
	$language['command']['tpclient']['not_finded'] = 'Użytkownik nie został znaleziony.';

	$language['command']['tpchannel']['to_small'] = 'Za krótka nazwa! Musisz podać przynajmniej 5 znaków!';
	$language['command']['tpchannel']['not_finded'] = 'Kanał nie został znaleziony.';

	$language['command']['help']['info']['help'] = 'Wyświetla listę wszystkich komend';
	$language['command']['help']['info']['pwall'] = 'Wysyła wiadomość prywatną do wszystkich klientów';
	$language['command']['help']['info']['pokeall'] = 'Pokuje wszystkich klientów';
	$language['command']['help']['info']['pwgroup'] = 'Wysyła wiadomość prywatną do klientów z wybraną rangą serwerową';
	$language['command']['help']['info']['pokegroup'] = 'Pokuje klientów z wybraną rangą serwerową';
	$language['command']['help']['info']['meeting'] = 'Przenosi administrację na wybrany kanał';
	$language['command']['help']['info']['clients'] = 'Wyświetla listę wszystkich klientów';
	$language['command']['help']['info']['channels'] = 'Wyświetla listę wszystkich kanałów';
	$language['command']['help']['info']['bot'] = 'Zarządza instancjami XBota';
	$language['command']['help']['info']['ch'] = 'Tworzy kanał prywatny użytkownikowi z podaną liczbą podkanałów';
	$language['command']['help']['info']['mute'] = 'Nadaje użytkownikowi określoną w configu rangę na podaną liczbę sekund';
	$language['command']['help']['info']['admin'] = 'Wypisuje informacje o podanym adminie';
	$language['command']['help']['info']['tpclient'] = 'Przenosi Cię do użytkownika z podanym nickiem';
	$language['command']['help']['info']['tpchannel'] = 'Przenosi Cię na kanał z podaną nazwą';

	$language['command']['help']['usage']['help'] = '!help';
	$language['command']['help']['usage']['pwall'] = '!pwall-[wiadomość]';
	$language['command']['help']['usage']['pokeall'] = '!pokeall-[wiadomość]';
	$language['command']['help']['usage']['pwgroup'] = '!pwgroup-[id_grupy]-[wiadomość]';
	$language['command']['help']['usage']['pokegroup'] = '!pokegroup-[id_grupy]-[wiadomość]';
	$language['command']['help']['usage']['meeting'] = '!meeting';
	$language['command']['help']['usage']['clients'] = '!clients';
	$language['command']['help']['usage']['channels'] = '!channels';
	$language['command']['help']['usage']['bot'] = '!bot-[id_instancji]';
	$language['command']['help']['usage']['ch'] = '!ch-[client_database_id]-[liczba_podkanałów]';
	$language['command']['help']['usage']['mute'] = '!mute-[client_database_id]-[liczba_sekund]';
	$language['command']['help']['usage']['admin'] = '!admin-[client_database_id]';
	$language['command']['help']['usage']['tpclient'] = '!tpclient-[client_nick]';
	$language['command']['help']['usage']['tpchannel'] = '!tpchannel-[nazwa_kanału]';

	$language['command']['help']['privileged'] = 'Mogą użyć: ';
	$language['command']['help']['inf'] = 'Informacje: ';
	$language['command']['help']['us'] = 'Użycie: ';

	$language['live_help'] = array
	(
		//Register
		'not_registered' => '(XBot) LiveHelp wykrył, że nie jesteś jeszcze zarejestrowany.',
		'reg_man' => 'aby zarejestrować się jako mężczyzna',
		'reg_woman' => 'aby zarejestrować się jako kobieta',

		//Menu
		'menu' => 'aby wyświetlić listę komend',
		'add' => 'aby nadać sobie rangę',
		'del' => 'aby zdjąć sobie rangę',
		'list' => 'aby wyświetlić listę rang',
		'faq' => 'aby wyświetlić faq',
		'client_info' => 'aby wyświetlić informacje o Tobie',
		'!admin' => 'aby wezwać admina',
		'registered' => 'Właśnie się zarejestrowałeś/aś!',
		'group_list' => 'Lista grup serwerowych',
		'write' => 'Napisz',
		'wait_admin' => 'Oczekujesz na pomoc admina!',
		'cancel_help' => 'aby odwołać pomoc u admina',	
		'success_exit' => 'Pomyślnie odwołano pomoc admina!',
		'channel' => 'aby dostać kanał prywatny',	

		//Poke admins
		'admin_informed' => 'Admin został już powiadomiony!',
		'admin_on_channel' => 'Admin znajduje się już na kanale pomocy!',

		//Server Groups
		'received_rang' => 'Właśnie otrzymałeś wybraną rangę!',
		'del_rang' => 'Właśnie zdjęto Ci rangę!',
		'limit' => 'Osiągnąłeś limi rang!',
		'not_have' => 'Nie posiadasz takiej rangi!',
		'wrong_rang' => 'Niepoprawna ranga!',

		//FAQ
		'info' => 'Informacje o Tobie:',
		'version' => 'Wersja aplikacji:',
		'country' => 'Kraj:',

		'bot_nick' => '[NAME] | Osób w kolejce: [NUM]',
		'wrong_command' => 'Nieznana komenda!',
	);

?>