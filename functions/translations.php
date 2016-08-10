<?php

// icl_register_string('Theme', '', get_field('', 'options'), false, 'sv');

// do_action( 'wpml_register_single_string', string $context, string $name, string $value )

do_action( 'wpml_register_single_string', 'Theme-header', 'Company name', get_field('translate_company_name', 'options'));
do_action( 'wpml_register_single_string', 'Theme-header', 'Address', get_field('translate_address', 'options'));
do_action( 'wpml_register_single_string', 'Theme-header', 'Zipcode', get_field('translate_zipcode', 'options'));
do_action( 'wpml_register_single_string', 'Theme-header', 'City', get_field('translate_city', 'options'));

//icl_register_string('Theme-header', 'Searching', get_field('t-searching', 'options'), false, 'sv');
//icl_register_string('Theme-header', 'Searching link', get_field('t-searching-link', 'options'), false, 'sv');
//icl_register_string('Theme-header', 'Rent out', get_field('t-rent_out', 'options'), false, 'sv');
//icl_register_string('Theme-header', 'Rent out link', get_field('t-rent_out-link', 'options'), false, 'sv');
//icl_register_string('Theme-header', 'Support', get_field('t-support', 'options'), false, 'sv');
//icl_register_string('Theme-header', 'Support link', get_field('t-support-link', 'options'), false, 'sv');
//icl_register_string('Theme-header', 'Log in', get_field('t-log_in', 'options'), false, 'sv');
//icl_register_string('Theme-header', 'Sign up', get_field('t-sign_up', 'options'), false, 'sv');
//icl_register_string('Theme-header', 'My pages', get_field('t-my_pages', 'options'), false, 'sv');
//
//
//
//icl_register_string('Theme-form', 'NextBtn', 'Nästa', false, 'sv');
//icl_register_string('Theme-form', 'BackBtn', 'Back', false, 'sv');
//icl_register_string('Theme-form', 'Country', 'Land', false, 'sv');
//icl_register_string('Theme-form', 'City', 'Stad/Region', false, 'sv');
//icl_register_string('Theme-form', 'Property', 'Egendom', false, 'sv');
//icl_register_string('Theme-form', 'Area placeholder', 'Namnet på området', false, 'sv');
//icl_register_string('Theme-form', 'Hometype', 'Typ av bostad', false, 'sv');
//icl_register_string('Theme-form', 'Rooms', 'Antal rum', false, 'sv');
//icl_register_string('Theme-form', 'Rooms amount', 'St', false, 'sv');
//icl_register_string('Theme-form', 'Size', 'Kvadratmeter', false, 'sv');
//icl_register_string('Theme-form', 'Address', 'Adress', false, 'sv');
//icl_register_string('Theme-form', 'Address placeholder', 'Storgatan 1b', false, 'sv');
//icl_register_string('Theme-form', 'Zipcode', 'Postnummer', false, 'sv');
//icl_register_string('Theme-form', 'Rent out date', 'Från vilket datum', false, 'sv');
//icl_register_string('Theme-form', 'Rent out date comment', 'Vi jobbar endast med långtids uthyrning. Minst 6 månader.', false, 'sv');
//icl_register_string('Theme-form', 'From date', 'Tillgänglig från datum', false, 'sv');
//icl_register_string('Theme-form', 'To date', 'Tillgänglig till datum', false, 'sv');
//icl_register_string('Theme-form', 'Rent out price', 'Hyra ut pris', false, 'sv');
//icl_register_string('Theme-form', 'Rent out price you want', 'Din hyra du vill ha', false, 'sv');
//icl_register_string('Theme-form', 'Rent out price recommend comment', 'Detta pris är vad vi rekommenderar för ditt objekt i detta området baserat på den statistik vi har tagit fram.', false, 'sv');
//icl_register_string('Theme-form', 'Rent out price Renthia', 'Hyran med Renthias service', false, 'sv');
//icl_register_string('Theme-form', 'Price', 'Önskat pris (Kr/Mån)', false, 'sv');
//icl_register_string('Theme-form', 'Eur/month', 'Kr/Mån', false, 'sv');
//icl_register_string('Theme-form', 'Month', '/Mån', false, 'sv');
//icl_register_string('Theme-form', 'Description', 'Objektbeskrivning', false, 'sv');
//icl_register_string('Theme-form', 'Description comment', 'Renthia rekommenderar att skriva så enkelt som möjligt. Ca 100 ord.', false, 'sv');
//icl_register_string('Theme-form', 'Description placeholder', 'Här skriver du en beskrivning av bostaden...', false, 'sv');
//icl_register_string('Theme-form', 'Date', 'Datum', false, 'sv');
//icl_register_string('Theme-form', 'Time', 'Tid', false, 'sv');
//icl_register_string('Theme-form', 'Choose time', 'Välj tid', false, 'sv');
//icl_register_string('Theme-form', 'Add showing', 'Lägg till visning', false, 'sv');
//icl_register_string('Theme-form', 'Add image', 'Lägg till bild', false, 'sv');
//icl_register_string('Theme-form', 'Forename', 'Förnamn', false, 'sv');
//icl_register_string('Theme-form', 'Surname', 'Efternamn', false, 'sv');
//icl_register_string('Theme-form', 'Telephonenumber', 'Telefonnummer', false, 'sv');
//icl_register_string('Theme-form', 'Telephone', 'Telefonnummer(valfritt)', false, 'sv');
//icl_register_string('Theme-form', 'E-mail', 'E-post', false, 'sv');
//icl_register_string('Theme-form', 'Send object', 'Lägg upp ditt boende', false, 'sv');
//icl_register_string('Theme-form', 'Contact us', 'Kontakta oss', false, 'sv');
//icl_register_string('Theme-form', 'Name', 'Namn', false, 'sv');
//icl_register_string('Theme-form', 'Name placeholder', 'Förnamn Efternamn', false, 'sv');
//icl_register_string('Theme-form', 'Problem', 'Problem & Ärende', false, 'sv');
//icl_register_string('Theme-form', 'Message', 'Meddelande', false, 'sv');
//icl_register_string('Theme-form', 'Send', 'Skicka', false, 'sv');
//icl_register_string('Theme-form', 'Submit form', 'publicera min dokumentera', false, 'sv');
//
//icl_register_string('Theme-form-options', 'Villa', 'Villa', false, 'sv');
//icl_register_string('Theme-form-options', 'Apartment', 'Lägenhet', false, 'sv');
//icl_register_string('Theme-form-options', 'Terraced', 'Del av rum', false, 'sv');
//icl_register_string('Theme-form-options', 'Heat', 'Värme', false, 'sv');
//icl_register_string('Theme-form-options', 'Water', 'Vatten', false, 'sv');
//icl_register_string('Theme-form-options', 'Dishwasher', 'Diskmaskin', false, 'sv');
//icl_register_string('Theme-form-options', 'Wheelchair access', 'Rullstolsaccess', false, 'sv');
//icl_register_string('Theme-form-options', 'Pets', 'Husdjur', false, 'sv');
//icl_register_string('Theme-form-options', 'Shower', 'Egen dusch', false, 'sv');
//icl_register_string('Theme-form-options', 'Smoking', 'Rökning tillåten', false, 'sv');
//icl_register_string('Theme-form-options', 'Washing machine', 'Tvättmaskin', false, 'sv');
//icl_register_string('Theme-form-options', 'Toilet', 'Egen toalett', false, 'sv');
//icl_register_string('Theme-form-options', 'Wi-Fi', 'Wifi', false, 'sv');
//icl_register_string('Theme-form-options', 'TV', 'TV', false, 'sv');
//icl_register_string('Theme-form-options', 'Parking', 'Parkering', false, 'sv');
//icl_register_string('Theme-form-options', 'Electricity', 'El', false, 'sv');
//icl_register_string('Theme-form-options', 'Furniture', 'Möblerad', false, 'sv');
//icl_register_string('Theme-form-options', 'Cleaning', 'Städning', false, 'sv');
//icl_register_string('Theme-form-options', 'Storage', 'Förvaring', false, 'sv');
//icl_register_string('Theme-form-options', 'Moving help', 'Flytthjälp', false, 'sv');
//
//icl_register_string('Theme-properties', 'Room', 'Rum', false, 'sv');
//icl_register_string('Theme-properties', 'Available', 'Tillgänglig', false, 'sv');
//icl_register_string('Theme-properties', 'Rented out', 'Uthyrd', false, 'sv');
//icl_register_string('Theme-properties', 'Housing', 'Boendet', false, 'sv');
//icl_register_string('Theme-properties', 'Utilities', 'Bekvämligheter inkluderat i hyran', false, 'sv');
//icl_register_string('Theme-properties', 'Available from', 'Tillgänglig från', false, 'sv');
//icl_register_string('Theme-properties', 'Available to', 'Tillgänglig till', false, 'sv');
//icl_register_string('Theme-properties', 'Size', 'Storlek', false, 'sv');
//icl_register_string('Theme-properties', 'About the property', 'Om bostaden', false, 'sv');
//icl_register_string('Theme-properties', 'Gallery', 'Galleri', false, 'sv');
//icl_register_string('Theme-properties', 'Location', 'Plats', false, 'sv');
//icl_register_string('Theme-properties', 'Related properties', 'Relaterade boenden', false, 'sv');
//icl_register_string('Theme-properties', 'Apply', 'Ansök om bostaden', false, 'sv');
//icl_register_string('Theme-properties', 'Results', 'Resultat', false, 'sv');
//icl_register_string('Theme-properties', 'Choose country', 'Välj land', false, 'sv');
//icl_register_string('Theme-properties', 'Choose city', 'Välj stad', false, 'sv');
//icl_register_string('Theme-properties', 'Sort by', 'Sortera efter', false, 'sv');
//icl_register_string('Theme-properties', 'Sort asc', 'Pris stigande', false, 'sv');
//icl_register_string('Theme-properties', 'Sort desc', 'Pris fallande', false, 'sv');
//icl_register_string('Theme-properties', 'Sort date asc', 'Datum äldst först', false, 'sv');
//icl_register_string('Theme-properties', 'Sort date desc', 'Datum senaste först', false, 'sv');
//icl_register_string('Theme-properties', 'Choose date', 'Välj datum', false, 'sv');
//icl_register_string('Theme-properties', 'Until further notice', 'Tills vidare', false, 'sv');
//icl_register_string('Theme-properties', 'Include', 'Inkludera uthyrda objekt', false, 'sv');
//
//icl_register_string('Theme-contact', 'Get contacted', 'Ansök och boka visning', false, 'sv');
//icl_register_string('Theme-contact', 'Get contacted about viewing', 'Kontakta mig angående visning', false, 'sv');
//icl_register_string('Theme-contact', 'Sidebar heading', get_field('sidebar_contact_heading', 'options'), false, 'sv');
//icl_register_string('Theme-contact', 'Sidebar text', get_field('sidebar_contact_text', 'options'), false, 'sv');
//icl_register_string('Theme-contact', 'Responsible Display Assistant', 'Ansvarig Visningsassistent', false, 'sv');
//
//
//icl_register_string('Theme', 'Sweden', 'Sverige', false, 'sv');
//icl_register_string('Theme', 'What says Renthias clients', 'Vad säger Renthias användare?', false, 'sv');
//
//do_action('wpml_register_single_string', 'Theme', 'Our latest apartment', 'Senast inkomna bostäder');
//icl_register_string('Theme', 'Our latest apartment', 'Senast inkomna bostäder', false, 'sv');
//icl_register_string('Theme', 'Our partners', 'Våra samarbetspartners', false, 'sv');
//icl_register_string('Theme', 'Our blogs', 'Våran blogg', false, 'sv');
//icl_register_string('Theme', 'Follow us', 'Föjl oss', false, 'sv');
//icl_register_string('Theme', 'Go back', 'Tillbaka', false, 'sv');
//
//icl_register_string('Theme-options', 'Thank you page', get_field('thank_you_page', 'options'), false, 'sv');
//icl_register_string('Theme-options', 'Apply landing page', get_field('apply_landing_page', 'options'), false, 'sv');
//icl_register_string('Theme-options', 'Landlord landing page', get_field('landlord_landing_page', 'options'), false, 'sv');
//
//icl_register_string('Theme-mypages', 'Create account', 'Skapa konto', false, 'sv');
//icl_register_string('Theme-mypages', 'My pages link', get_field('my_pages-my_pages_link', 'options'), false, 'sv');
//icl_register_string('Theme-mypages', 'My property link', get_field('my_pages-my_property', 'options'), false, 'sv');
//icl_register_string('Theme-mypages', 'My contract link', get_field('my_pages-my_contract', 'options'), false, 'sv');
//icl_register_string('Theme-mypages', 'My inventory list link', get_field('my_pages-my_inventory', 'options'), false, 'sv');
//icl_register_string('Theme-mypages', 'My inspection list link', get_field('my_pages-my_inspection', 'options'), false, 'sv');
//icl_register_string('Theme-mypages', 'Update', 'Uppdatera', false, 'sv');
//icl_register_string('Theme-mypages', 'Username', 'Användarnamn', false, 'sv');
//icl_register_string('Theme-mypages', 'Update contact information', 'Uppdatera kontaktuppgifter', false, 'sv');
//icl_register_string('Theme-mypages', 'My property', 'Min bostad', false, 'sv');
//icl_register_string('Theme-mypages', 'My documents', 'Mina dokument', false, 'sv');
//icl_register_string('Theme-mypages', 'Contract', 'Kontrakt', false, 'sv');
//icl_register_string('Theme-mypages', 'Inventory list', 'Inventarielista', false, 'sv');
//icl_register_string('Theme-mypages', 'Inspection list', 'Besiktningsdokument', false, 'sv');
//icl_register_string('Theme-mypages', 'Complete', 'Färdigställt', false, 'sv');
//icl_register_string('Theme-mypages', 'Incomplete', 'Färdigställ', false, 'sv');
//
//
//// my contract form
//icl_register_string('Theme-mycontract', 'Personal number', 'Personnummer', false, 'sv');
//icl_register_string('Theme-mycontract', 'Room number', 'Apartment/House number', false, 'sv');
//icl_register_string('Theme-mycontract', 'Bank name', 'Bank', false, 'sv');
//icl_register_string('Theme-mycontract', 'Clearing number', 'Clearingnummer', false, 'sv');
//icl_register_string('Theme-mycontract', 'Account number', 'Kontonummer', false, 'sv');
//icl_register_string('Theme-mycontract', 'Rental period 1', 'Hyresperioden 1', false, 'sv');
//icl_register_string('Theme-mycontract', 'Rental period 2', 'Hyresperioden 2', false, 'sv');
//icl_register_string('Theme-mycontract', 'Rental period 3', 'Hyresperioden 3 (mindre än 9 månader)', false, 'sv');
//icl_register_string('Theme-mycontract', 'From date to further notice', 'Från - tillsvidare', false, 'sv');
//icl_register_string('Theme-mycontract', 'From date', 'Från datum', false, 'sv');
//icl_register_string('Theme-mycontract', 'To date', 'Slutdatum', false, 'sv');
//icl_register_string('Theme-mycontract', 'Electricity/gas', 'El/gas', false, 'sv');
//icl_register_string('Theme-mycontract', 'Water', 'Vatten', false, 'sv');
//icl_register_string('Theme-mycontract', 'Heat', 'Värme', false, 'sv');
//icl_register_string('Theme-mycontract', 'Garage', 'Garage', false, 'sv');
//icl_register_string('Theme-mycontract', 'Wi-Fi', 'Wi-Fi', false, 'sv');
//icl_register_string('Theme-mycontract', 'Cable TV', 'Kabel TV', false, 'sv');
//icl_register_string('Theme-mycontract', 'Parking place', 'Parkeringsplats', false, 'sv');
//icl_register_string('Theme-mycontract', 'Storage', 'Förråd', false, 'sv');
//icl_register_string('Theme-mycontract', 'Kallhyra', 'Kallhyra', false, 'sv');
//icl_register_string('Theme-mycontract', 'Is not Kallhyra', 'Inte kallhyra', false, 'sv');
//icl_register_string('Theme-mycontract', 'Garbage handling', 'Sophantering', false, 'sv');
//icl_register_string('Theme-mycontract', 'Community fee', 'Samhällsavgift', false, 'sv');
//icl_register_string('Theme-mycontract', 'Operation fee', 'Maxavgift', false, 'sv');
//icl_register_string('Theme-mycontract', 'Electricity fee', 'El', false, 'sv');
//icl_register_string('Theme-mycontract', 'Is furnished', 'Möblerad', false, 'sv');
//icl_register_string('Theme-mycontract', 'Partly furnished', 'Delvis Möblerad', false, 'sv');
//icl_register_string('Theme-mycontract', 'Unfurnished', 'Omöblerad', false, 'sv');
//icl_register_string('Theme-mycontract', 'Keep pets', 'Husdjur', false, 'sv');
//icl_register_string('Theme-mycontract', 'Is allowed', 'Tillåtet', false, 'sv');
//icl_register_string('Theme-mycontract', 'Is not allowed', 'Inte tillåtet', false, 'sv');
//icl_register_string('Theme-mycontract', 'Key sets', 'Nyckeluppsättningar', false, 'sv');
//icl_register_string('Theme-mycontract', 'Other paragraphs', 'Övriga paragrafer', false, 'sv');
//// my contract content
//icl_register_string('Theme-mycontract', 'The lease is entered', 'Detta hyresavtal (”Hyresavtalet”) har ingåtts den', false, 'sv');
//icl_register_string('Theme-mycontract', 'between', 'mellan', false, 'sv');
//icl_register_string('Theme-mycontract', 'Landlord and', '(”Hyresvärden”)', false, 'sv');
//icl_register_string('Theme-mycontract', 'Tenant', '(”Hyresgästen”)', false, 'sv');
//icl_register_string('Theme-mycontract', 'Tenant title', 'Hyresgästen', false, 'sv');
//icl_register_string('Theme-mycontract', 'Renthia', 'och Renthia AB 559010-9525', false, 'sv');
//icl_register_string('Theme-mycontract', 'The landlord hereby leases', 'Hyresvärden hyr härmed ut, på de villkor som följer av Hyresavtalet, till Hyresgästen sin bostadsrätt / bostad om', false, 'sv');
//icl_register_string('Theme-mycontract', 'room', 'rum', false, 'sv');
//icl_register_string('Theme-mycontract', 'about', 'om ca', false, 'sv');
//icl_register_string('Theme-mycontract', 'with address', 'med adress', false, 'sv');
//icl_register_string('Theme-mycontract', 'number of apartment', 'lghnr', false, 'sv');
//icl_register_string('Theme-mycontract', 'rental object', '(”Hyresobjektet”)', false, 'sv');
//icl_register_string('Theme-mycontract', 'Rental period', 'Hyresperioden', false, 'sv');
//icl_register_string('Theme-mycontract', 'From', 'Från', false, 'sv');
//icl_register_string('Theme-mycontract', 'To', 'till', false, 'sv');
//icl_register_string('Theme-mycontract', 'The property is', 'Fastigheten är', false, 'sv');
//icl_register_string('Theme-mycontract', 'Rental price', 'Hyran', false, 'sv');
//icl_register_string('Theme-mycontract', 'Insurance premium', 'Försäkringspremie', false, 'sv');
//icl_register_string('Theme-mycontract', 'In total', 'Totalt', false, 'sv');
//icl_register_string('Theme-mycontract', 'Deposit', 'Deposition', false, 'sv');
//icl_register_string('Theme-mycontract', 'First month payment', 'Första månaden betalning', false, 'sv');
//icl_register_string('Theme-mycontract', 'Invoice received mail', 'Faktura skickas till', false, 'sv');
//icl_register_string('Theme-mycontract', 'Landlord', 'Hyresvärd', false, 'sv');
//icl_register_string('Theme-mycontract', 'Renthia service charge', 'Renthia serviceavgift', false, 'sv');
//icl_register_string('Theme-mycontract', 'Received rental price', 'Mottagna hyran', false, 'sv');
//icl_register_string('Theme-mycontract', 'The rental will include', 'Hyran kommer att inkludera', false, 'sv');
//icl_register_string('Theme-mycontract', 'If', 'Om', false, 'sv');
//icl_register_string('Theme-mycontract', 'is included, the cost of', 'ingår, får kostanden', false, 'sv');
//icl_register_string('Theme-mycontract', 'will be a maximum of', 'max uppgå till', false, 'sv');
//icl_register_string('Theme-mycontract', 'month', 'månad', false, 'sv');
//icl_register_string('Theme-mycontract', 'Excess amounts will be', ' Överstigande belopp betalas retroaktivt utav Hyresgäst', false, 'sv');
//icl_register_string('Theme-mycontract', 'to keep pets in the rented property', 'att hålla husdjur i hyresobjektet', false, 'sv');
//icl_register_string('Theme-mycontract', 'The rent shall be occupied', 'Bostaden skall bebos av', false, 'sv');
//icl_register_string('Theme-mycontract', 'sets of keys', 'uppsättningar nycklar', false, 'sv');
//icl_register_string('Theme-mycontract', 'The keys is handed', 'uppsättningar nycklar överlämnas till Hyresgästen vid inflyttning och till Hyrevärden vid utflyttning', false, 'sv');
//
//icl_register_string('Theme-inventory_inspection', 'Kitchen', 'Kök', false, 'sv');
//icl_register_string('Theme-inventory_inspection', 'Living room', 'Vardagsrum', false, 'sv');
//icl_register_string('Theme-inventory_inspection', 'Bathroom', 'Badrum', false, 'sv');
//icl_register_string('Theme-inventory_inspection', 'Bedroom', 'Sovrum', false, 'sv');
//icl_register_string('Theme-inventory_inspection', 'Toalett', 'Toalett', false, 'sv');
//icl_register_string('Theme-inventory_inspection', 'Entrance', 'Hall', false, 'sv');
//icl_register_string('Theme-inventory_inspection', 'Others', 'Övrigt', false, 'sv');
//icl_register_string('Theme-inventory_inspection', 'Add line', 'Lägg till', false, 'sv');
//icl_register_string('Theme-inventory_inspection', 'Name', 'Möbel', false, 'sv');
//icl_register_string('Theme-inventory_inspection', 'Count', 'Antal', false, 'sv');
//icl_register_string('Theme-inventory_inspection', 'Notes', 'Anteckningar', false, 'sv');
//
//icl_register_string('Theme-login', 'Login heading', get_field('login-heading', 'options'), false, 'sv');
//icl_register_string('Theme-login', 'Login text', get_field('login-text', 'options'), false, 'sv');
//icl_register_string('Theme-login', 'Signup heading', get_field('signup-heading', 'options'), false, 'sv');
//icl_register_string('Theme-login', 'Signup text', get_field('signup-text', 'options'), false, 'sv');
//icl_register_string('Theme-login', 'Register text', get_field('login-register_text', 'options'), false, 'sv');
//icl_register_string('Theme-login', 'Forgot password?', get_field('login-forgot_password', 'options'), false, 'sv');
//icl_register_string('Theme-login', 'Password', 'Lösenord', false, 'sv');
//icl_register_string('Theme-login', 'Login Button text', get_field('login-button_text', 'options'), false, 'sv');
//icl_register_string('Theme-login', 'Signup Button text', get_field('signup-button_text', 'options'), false, 'sv');
//icl_register_string('Theme-login', 'Login page link', get_field('login-url', 'options'), false, 'sv');
//icl_register_string('Theme-login', 'Facebook login', 'Logga in med Facebook', false, 'sv');
//icl_register_string('Theme-login', 'Google login', 'Logga in med Google', false, 'sv');
//icl_register_string('Theme-login', 'Facebook signup', 'Bli medlem med Facebook', false, 'sv');
//icl_register_string('Theme-login', 'Google signup', 'Bli medlem med Google', false, 'sv');
//icl_register_string('Theme-login', 'Or', 'Eller', false, 'sv');
//icl_register_string('Theme-login', 'Already have account', 'Är du redan medlem av Renthia?', false, 'sv');
//icl_register_string('Theme-login', 'Dont have account', 'Har du inget konto?', false, 'sv');
//
//icl_register_string('Theme-login', 'Show map', 'Visa karta', false, 'sv');
//
//icl_register_string('Theme-login', 'Property not registered correctly', 'För att slutföra registreringen av objektet, måste du logga in eller skapa ett konto.', false, 'sv');
//
//icl_register_string('Theme-errors', 'Login failed', 'Det gick inte att logga in, kontrollera dina inloggningsuppgifter och försök igen', false, 'sv');
//icl_register_string('Theme-errors', 'Email already in use', 'E-post adressen är redan registrerad, glömt lösenordet?', false, 'sv');
//icl_register_string('Theme-errors', 'Username max 60 characters', 'Användarnamnet får inte vara längre än 60 tecken', false, 'sv');
//icl_register_string('Theme-errors', 'Account information is needed', 'Du måste fylla i inloggnigsuppgifter', false, 'sv');
////icl_register_string('Theme-errors', '', '', false, 'sv');
//
////icl_register_string('Theme-myproperties', '', '', false, 'sv');
//icl_register_string('Theme-about-us', 'what we do', 'Vad Vi Gör', false, 'sv');
//icl_register_string('Theme-about-us', 'intro-1', 'Hyresvärdar som vi hjälper just nu', false, 'sv');
//icl_register_string('Theme-about-us', 'intro-2', 'Boendevolymen i kvadratmeter som vi tar hand om', false, 'sv');
//icl_register_string('Theme-about-us', 'intro-3', 'Månadsvis som kollar på bostäder', false, 'sv');
//icl_register_string('Theme-about-us', 'intro-4', 'Över 25,000 Besökare', false, 'sv');
//icl_register_string('Theme-about-us', 'who we are', 'Vem Vi Är', false, 'sv');
//
//icl_register_string('Theme-how-it-works', 'contact-text', 'Vi vill gärna höra från dig, mer information kontakta:', false, 'sv');
//
//
//icl_register_string('Theme-qa', 'About Renthia', 'Om Renthia', false, 'sv');
//icl_register_string('Theme-qa', 'My account', 'Mitt konto', false, 'sv');
//icl_register_string('Theme-qa', 'Payment', 'Betalning', false, 'sv');
//icl_register_string('Theme-qa', 'Contract/Inventory list/Inspection list', 'Hyresavtal / Inventarielista / Besiktningsinstrument', false, 'sv');
//icl_register_string('Theme-qa', 'Landlord', 'Hyresvärd', false, 'sv');
//icl_register_string('Theme-qa', 'Tenant', 'Hyresgäst', false, 'sv');
//icl_register_string('Theme-qa', 'Legal issue', 'Juridiska frågor', false, 'sv');
//icl_register_string('Theme-qa', 'Insurance', 'Försäkring', false, 'sv');
//icl_register_string('Theme-qa', 'View more', 'Ser mer...', false, 'sv');
//icl_register_string('Theme-qa', 'Hide', 'Dölja', false, 'sv');





















