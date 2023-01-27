<?php

declare(strict_types = 1);

return [
    'label' => 'Meny',
    'plural' => 'Meny',
    'singular' => 'Mena',
    'detail' => 'Mena: :title',

    'create.button' => 'Pridať menu',
    'update.button' => 'Upraviť menu',

    'import.description' => 'Európska Centrálna Banka zverejňuje denne aktuálny kurz vždy okolo 16:00 CET.',
    'import.button' => 'Aktualizovať',

    'field.code' => 'Kód',
    'field.code.help' => 'Zadajte kód meny napr. EUR, CZK, USD...',
    'field.symbol' => 'Symbol',
    'field.symbol.help' => 'Zadajte znakový symbol meny.',
    'field.title' => 'Názov meny',
    'field.title.help' => 'Zadajte názov meny v medzinárodnom jazyku.',
    'field.symbol_place' => 'Umiestnenie symbolu',
    'field.symbol_place.before' => 'Pred sumou',
    'field.symbol_place.after' => 'Za sumou',
    'field.symbol_place.help' => 'Vyberte kde bude umiestnený symbol.',
    'field.decimals' => 'Počet desatiných miest',
    'field.decimals.help' => 'Zadajte počet desatiných miest pri sume.',
    'field.decimal_separator' => 'Oddeľovač desatiných miest',
    'field.decimal_separator.comma' => 'Čiarka',
    'field.decimal_separator.dot' => 'Bodka',
    'field.decimal_separator.help' => 'Vyberte akým znakom budú oddelené desatinné miesta.',
    'field.thousands_separator' => 'Oddeľovač tisícov',
    'field.thousands_separator.space' => 'Medzera',
    'field.thousands_separator.dot' => 'Bodka',
    'field.thousands_separator.help' => 'Vyberte akým znakom budú oddelené tisíce.',
    'field.coefficient' => 'Koefficient',
    'field.coefficient.help' => 'Prepočtový koeficient voči základnej mene.',
    'field.updated_at' => 'Posledná aktualizácia',
    'field.basic' => 'Základná',
    'field.status' => 'Aktívna',
    'field.status.help' => 'Zvoľte či je mena aktívna a bude ponúkaná v systéme.',

    'with_tax' => 's DPH',
    'without_tax' => 'bez DPH',
];
