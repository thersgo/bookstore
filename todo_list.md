Rakenduse vajalik funktsionaalsus:

- [ ] Raamatute nimekiri
  - Loo avaleht, millel kuvatakse andmebaasis olevate raamatute nimekiri.
  - Raamatu pealkiri peab olema link, millele vajutades avaneb konkreetse
    raamatu detailvaade.
  - Kustutatud raamatuid nimekirjas näidata ei tohi; Raamatu kustutamine toimub
    soft delete põhimõttel, ehk raamatut ei kustutata andmebaasist füüsiliselt.

- [ ] Raamatu detailvaade
  - Loo vaade, kus saab vaadata ühe konkreetse raamatu andmeid.
  - Raamat määratakse URL-is oleva id GET-parameetri abil,
    näiteks: `book.php?id=15`
  - Detailvaates peab olema võimalik näha vähemalt 7 raamatu omadust.
    Hind ümardada kahe komakohani.
  - Üks omadustest peab olema raamatu pilt.
  - Lisaks peab detailvaates olema näha raamatu autor või autorid.
    Ühel raamatul võib olla mitu autorit.
  - Detailvaates peavad olema lingid või nupud vähemalt järgmiste tegevuste
    jaoks:
    - raamatu muutmine;
    - raamatu kustutamine;
    - tagasi raamatute nimekirja.

- [ ] Raamatu muutmine
  - Loo raamatu muutmise vaade.
  - Vorm peab laadima olemasolevad raamatu andmed andmebaasist ning näitama
    neid vormiväljadel.
    - Kasuta selleks jällegi `id` `GET`-parameetrit.
  -  Kasutaja peab saama muuta vähemalt:
    - raamatu pealkirja;
    - vähemalt nelja muud raamatu välja.
      - Hind ümardada kahe komakohani.
  - Muudatused tuleb salvestada andmebaasi.
  - Andmete salvestamisel kasuta vähemalt `POST` meetodit ning `PDO prepared
    statement`e.
  - Võib kasutada sama vaate PHP-faili või luua uus skript kuhu suunatakse
    salvastamiseks.
  - Pärast edukat salvestamist tuleb kasutajale anda tagasiside ja/või suunata
    ta tagasi raamatu detailvaatesse.

- [ ] Raamatu autorite muutmine
  - Raamatu võib olla mitu autorit. Seetõttu peab rakendus võimaldama raamatu
    autoreid eraldi hallata.
  - Kasutaja saab valida autori olemasolevate autorite nimekirjast. Autor tuleb
    valida rippmenüüst (select).
  - Autor lisatakse raamatule ühe autori kaupa.
  - Autori eemaldamine: Raamatu juures kuvatakse kõik selle raamatu autorid. 
  - Iga autori juures peab olema võimalus autor eemaldada.
    - Autorit ei tohi selle tegevuse käigus autorite tabelist kustutada.
    - Eemaldada tuleb raamatu ja autori vaheline seos.
  - Autori lisamisel ja eemaldamisel peab olema tegemist eraldi vormi ja
    submit-nupuga kui raamatu muude andmete muutmisel.
    - Seega võib raamatu muutmise lehel olla mitu vormi:
      - raamatu andmete muutmise vorm;
      - autori lisamise vorm;
      - autorite eemaldamise vormid.

- [ ] Raamatu kustutamine
  - Lisa raamatu detailvaatesse Kustuta raamat nupp.
  - Raamatu kustutamine peab toimuma soft delete abil.
  - Raamatute tabelis peab selle jaoks olema väli `is_deleted`;
    0 = aktiivne, 1 = kustutatud.
  - Kui sinu olemasolevas andmebaasis is_deleted välja ei ole, tuleb see
    andmebaasi lisada.
    - Seda võib teha näiteks `MySQL Workbench`i või mõne muu andmebaasikliendi
      abil.

- [ ] Uue autori lisamine
  - Loo eraldi vaade uue autori lisamiseks.
  - Vorm peab sisaldama vähemalt: eesnime; perekonnanime.
  - Vormi saatmisel tuleb uus autor salvestada andmebaasi.
  - Uue autori lisamine peab kasutama POST päringut.
  - Pärast edukat lisamist tuleb kasutajale anda tagasiside.
  - Avalehel või rakenduse navigatsioonis peab olema link „Lisa autor“
    vaatesse.

- [ ] Raamatute otsimine
  - Lisa raamatute nimekirja juurde otsinguväli.
  - Otsing peab mõjutama andmebaasist tehtavat päringut.
  - Otsida peab saama raamatu nimes esineva stringi järgi.
  - Otsingus tuleb kasutada `prepared statement`i.

- [ ] Tehnilised nõuded
  - Kasuta vanilla PHP-d. PHP raamistikke ei ole vaja kasutada. Võib kasutada
    Tailwindi.
  - Andmebaasiga suhtlemiseks kasuta PDO-d.
  - Kõik kasutaja sisendit sisaldavad SQL-päringud peavad kasutama `prepared
    statement`e.
  - Kasuta tegevuste jaoks sobivaid HTTP meetodeid. HTML-vormide puhul võib
    kasutada:
    - GET andmete otsimiseks ja kuvamiseks;
    - POST andmete lisamiseks, muutmiseks ja kustutamise algatamiseks.
  - Hind ümardada kahe komakohani.
  - Aasta on meile sobivas formaadis.

10) Vigade käsitlemine
  - Rakendus peab arvestama vähemalt järgmiste olukordadega:
    - kasutaja avab raamatu ID-ga, mida ei eksisteeri;
    - kasutaja jätab kohustusliku välja täitmata;
    - otsing ei anna ühtegi tulemust;
    - kasutaja proovib lisada sama autori raamatule teist korda;
      - (Näita rippmenüüs ainult autoreid, mis ei ole juba raamatuga seotud.)
    - kasutaja proovib eemaldada autorit, kes ei ole selle raamatuga seotud.
  - Kasutajale tuleb näidata arusaadavat teadet, mitte PHP `warning`u või SQL
    veateadet.

11) Kontrolli enne töö esitamist, et järgmised tegevused töötavad:
  - Raamatute nimekirja vaatamine
  - Kustutatud raamatute peitmine
  - Raamatu detailvaate avamine ID järgi
  - Vähemalt 7 raamatu omaduse kuvamine
  - Raamatu pildi kuvamine
  - Raamatu mitme autori kuvamine
  - Raamatu andmete muutmine
  - Vähemalt 5 raamatu välja muutmine
  - Autori lisamine raamatule
  - Autori eemaldamine raamatult
  - Uue autori lisamine
  - Raamatu soft delete
  - Raamatute otsimine
  - PDO kasutamine
  - `Prepared statement`ide kasutamine
  - Vormide sisendi valideerimine
  - Vigaste olukordade käsitlemine
