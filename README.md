# Suojainmatriisi

Suojavarusteiden opastussovellus työmaaiden ja tehtävänimikkeiden hallintaan.

## Ominaisuudet

- Valitse työmaa ja tehtävä → näe vaaditut suojavarusteet
- Admin-paneeli hallintoon
- Roolipohjaiset käyttöoikeudet
- Responsive design (mobiili, tabletti, desktop)
- PWA-tuki
- Monikielinen käyttöliittymä

## Vaatimukset

- PHP 8.0+
- MySQL 5.7+ / MariaDB 10.2+
- Modernit selaimet (Chrome, Firefox, Safari, Edge)

## Asennus

1. Lataa sovellus palvelimelle
2. Luo tietokanta ja aja `database/schema.sql`
3. Muokkaa `config/database.php` tietokanta-yhteyden tiedoilla
4. Avaa selaimella sovellusta

## Käyttäjäroolit

- **Admin** - Hallinnoi kaikkea
- **Safety Manager** - Päivittää matriisia
- **Site Supervisor** - Näkee matriisia
- **User** - Katselee ohjeita
