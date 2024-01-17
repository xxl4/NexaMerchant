<?php

return [
    'users' => [
        'sessions' => [
            'email'                => 'Indirizzo Email',
<<<<<<< HEAD
            'forget-password-link' => 'Hai dimenticato la password?',
=======
            'forget-password-link' => 'Password Dimenticata?',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            'password'             => 'Password',
            'submit-btn'           => 'Accedi',
            'title'                => 'Accedi',
        ],

        'forget-password' => [
<<<<<<< HEAD
            'create' => [
                'email'           => 'Email registrata',
                'email-not-exist' => 'Email non esistente',
                'page-title'      => 'Password dimenticata',
                'reset-link-sent' => 'Link per il reset della password inviato',
                'sign-in-link'    => 'Torna al login?',
                'submit-btn'      => 'Reset',
                'title'           => 'Recupera la password',
=======
            'create'    => [
                'email'           => 'Email Registrata',
                'email-not-exist' => 'Email Non Esistente',
                'page-title'      => 'Password Dimenticata',
                'reset-link-sent' => 'Link per il ripristino della password inviato',
                'sign-in-link'    => 'Torna al Login?',
                'submit-btn'      => 'Ripristina',
                'title'           => 'Recupera Password',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ],
        ],

        'reset-password' => [
<<<<<<< HEAD
            'back-link-title'  => 'Torna al login?',
=======
            'back-link-title'  => 'Torna al Login?',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            'confirm-password' => 'Conferma Password',
            'email'            => 'Email Registrata',
            'password'         => 'Password',
            'submit-btn'       => 'Ripristina Password',
            'title'            => 'Ripristina Password',
        ],
    ],

    'notifications' => [
<<<<<<< HEAD
        'description-text' => 'Elenca tutte le notifiche',
        'marked-success'   => 'Notifica contrassegnata con successo',
        'no-record'        => 'Nessun record trovato',
        'read-all'         => 'Segna come Letto',
        'title'            => 'Notifiche',
        'view-all'         => 'Visualizza Tutte',
=======
        'description-text'      => 'Elenca tutte le notifiche',
        'marked-success'        => 'Notifica contrassegnata con successo',
        'no-record'             => 'Nessun Record Trovato',
        'read-all'              => 'Segna come Letto',
        'title'                 => 'Notifiche',
        'view-all'              => 'Visualizza Tutte',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

        'order-status-messages' => [
            'completed'       => 'Ordine Completato',
            'closed'          => 'Ordine Chiuso',
            'canceled'        => 'Ordine Annullato',
<<<<<<< HEAD
            'pending'         => 'Ordine in Attesa',
            'processing'      => 'Ordine in Elaborazione',
            'pending-payment' => 'Pagamento in Attesa',
=======
            'pending'         => 'Ordine in Sospeso',
            'processing'      => 'Ordine in Elaborazione',
            'pending-payment' => 'Pagamento in Sospeso',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ],

        'status'  => [
            'all'        => 'Tutti',
            'canceled'   => 'Annullato',
            'closed'     => 'Chiuso',
            'completed'  => 'Completato',
<<<<<<< HEAD
            'pending'    => 'In sospeso',
            'processing' => 'In lavorazione',
=======
            'pending'    => 'In Sospeso',
            'processing' => 'In Elaborazione',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ],
    ],

    'account' => [
        'edit' => [
            'back-btn'          => 'Indietro',
            'confirm-password'  => 'Conferma Password',
            'change-password'   => 'Cambia Password',
            'current-password'  => 'Password Attuale',
            'email'             => 'Email',
            'general'           => 'Generale',
            'invalid-password'  => 'La password attuale inserita non è corretta.',
            'name'              => 'Nome',
<<<<<<< HEAD
            'profile-image'     => 'Immagine del Profilo',
=======
            'profile-image'     => 'Immagine Profilo',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            'password'          => 'Password',
            'save-btn'          => 'Salva Account',
            'title'             => 'Il Mio Account',
            'upload-image-info' => 'Carica un\'Immagine del Profilo (110px X 110px) in formato PNG o JPG',
            'update-success'    => 'Account aggiornato con successo',
        ],
    ],

    'dashboard' => [
        'index' => [
<<<<<<< HEAD
            'add_customer'                => 'Aggiungi Cliente',
            'average-sale'                => 'Vendita Media per Ordine',
            'add-product'                 => 'Aggiungi Prodotto',
            'attribute-code'              => 'Codice Attributo',
            'color'                       => 'Colore',
            'customer-with-most-sales'    => 'Cliente con più Vendite',
            'customer-info'               => 'Nessun Cliente Trovato con più Vendite',
            'date-duration'               => ':start - :end',
            'decreased'                   => ':progress%',
            'end-date'                    => 'Data di Fine',
            'empty-threshold'             => 'Soglia Vuota',
=======
            'add-customer'                => 'Aggiungi Cliente',
            'average-sale'                => 'Vendita Media Ordine',
            'add-product'                 => 'Aggiungi Prodotto',
            'attribute-code'              => 'Codice Attributo',
            'color'                       => 'Colore',
            'customer-with-most-sales'    => 'Cliente con Più Vendite',
            'customer-info'               => 'Nessun Cliente Trovato con Più Vendite',
            'date-duration'               => ':start - :end',
            'decreased'                   => ':progress%',
            'end-date'                    => 'Data di Fine',
            'empty-threshold'             => 'Soglia di Vuoto',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            'empty-threshold-description' => 'Non ci sono prodotti disponibili',
            'from'                        => 'Da',
            'increased'                   => ':progress%',
            'more-products'               => ':product_count+ Altre Immagini',
            'order-count'                 => ':count Ordini',
            'order'                       => ':total_orders Ordini',
            'order-id'                    => '#:id',
            'overall-details'             => 'Dettagli Generali',
            'product-count'               => ':count Prodotti',
            'product-number'              => 'Prodotto - :product_number',
            'product-image'               => 'Immagine Prodotto',
            'pay-by'                      => 'Pagato Con - :method',
<<<<<<< HEAD
            'product-info'                => 'Aggiungi prodotti correlati mentre sei in viaggio.',
            'revenue'                     => 'Ricavo :total',
            'stock-threshold'             => 'Soglia di Scorta',
=======
            'product-info'                => 'Aggiungi prodotti correlati in modo rapido.',
            'revenue'                     => 'Ricavo :total',
            'stock-threshold'             => 'Soglia di Stock',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            'sale-count'                  => ':count Vendite',
            'sales'                       => 'Vendite',
            'sku'                         => 'SKU - :sku',
            'start-date'                  => 'Data di Inizio',
            'store-stats'                 => 'Statistiche del Negozio',
            'to'                          => 'A',
            'title'                       => 'Dashboard',
            'top-performing-categories'   => 'Categorie più Performanti',
            'top-selling-products'        => 'Prodotti più Venduti',
<<<<<<< HEAD
            'total-customers'             => 'Clienti Totali',
            'total-orders'                => 'Ordini Totali',
            'total-sales'                 => 'Vendite Totali',
            'total-unpaid-invoices'       => 'Fatture Non Pagate Totali',
            'total-stock'                 => ':total_stock Scorte',
=======
            'total-customers'             => 'Totale Clienti',
            'total-orders'                => 'Totale Ordini',
            'total-sales'                 => 'Totale Vendite',
            'total-unpaid-invoices'       => 'Totale Fatture Non Pagate',
            'total-stock'                 => 'Stock :total_stock',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            'today-orders'                => 'Ordini di Oggi',
            'today-sales'                 => 'Vendite di Oggi',
            'today-customers'             => 'Clienti di Oggi',
            'today-details'               => 'Dettagli di Oggi',
<<<<<<< HEAD
            'unique-visitors'             => ':count Unico',
            'user-name'                   => 'Ciao ! :user_name',
            'user-info'                   => 'Rivedi rapidamente cosa sta succedendo nel tuo negozio',
            'visitors'                    => 'Visitatore',
=======
            'unique-visitors'             => ':count unici',
            'user-name'                   => 'Ciao ! :user_name',
            'user-info'                   => 'Rivedi rapidamente cosa sta succedendo nel tuo negozio',
            'visitors'                    => 'Visitatori',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ],
    ],

    'sales' => [
        'orders' => [
            'index' => [
                'title' => 'Ordini',

                'datagrid' => [
                    'customer'        => 'Cliente',
                    'channel-name'    => 'Canale',
                    'completed'       => 'Completato',
                    'canceled'        => 'Annullato',
                    'closed'          => 'Chiuso',
                    'date'            => 'Data',
                    'email'           => 'Email',
                    'fraud'           => 'Frode',
                    'grand-total'     => 'Totale Generale',
                    'id'              => '#:id',
                    'images'          => 'Immagini',
<<<<<<< HEAD
                    'location'        => 'Luogo',
                    'order-id'        => 'ID Ordine',
                    'pay-via'         => 'Paga Con',
                    'pay-by'          => 'Paga Con - :method',
                    'processing'      => 'In Elaborazione',
                    'pending'         => 'In Attesa',
                    'pending-payment' => 'Pagamento in Sospeso',
                    'product-count'   => ':count + Altri prodotti',
                    'status'          => 'Stato',
                    'success'         => 'Successo',
                    'view'            => 'Vedi',
=======
                    'location'        => 'Posizione',
                    'order-id'        => 'ID Ordine',
                    'pay-via'         => 'Paga tramite',
                    'pay-by'          => 'Paga con - :method',
                    'processing'      => 'In Elaborazione',
                    'pending'         => 'In Attesa',
                    'pending-payment' => 'Pagamento in Sospeso',
                    'product-count'   => ':count + Altri Prodotti',
                    'status'          => 'Stato',
                    'success'         => 'Successo',
                    'view'            => 'Visualizza',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                ],
            ],

            'view' => [
<<<<<<< HEAD
                'amount-per-unit'       => ':amount Per Unit x :qty Quantità',
                'billing-address'       => 'Indirizzo di Fatturazione',
                'cancel'                => 'Annulla',
                'comments'              => 'Commenti',
                'cancel-msg'            => 'Sei sicuro di voler annullare questo ordine',
                'customer-notified'     => ':date | Cliente <b>Avvisato</b>',
                'customer-not-notified' => ':date | Cliente <b>Non Avvisato</b>',
=======
                'amount-per-unit'       => ':amount Per Unità x :qty Quantità',
                'billing-address'       => 'Indirizzo di Fatturazione',
                'cancel'                => 'Annulla',
                'comments'              => 'Commenti',
                'cancel-msg'            => 'Sei sicuro di voler annullare questo ordine?',
                'customer-notified'     => ':date | Cliente <b>Notificato</b>',
                'customer-not-notified' => ':date | Cliente <b>Non Notificato</b>',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'customer'              => 'Cliente',
                'customer-group'        => 'Gruppo Cliente',
                'channel'               => 'Canale',
                'currency'              => 'Valuta',
                'contact'               => 'Contatto',
                'comment-success'       => 'Commento aggiunto con successo.',
                'create-success'        => 'Ordine creato con successo',
                'cancel-success'        => 'Ordine annullato con successo',
                'canceled'              => 'Annullato',
                'closed'                => 'Chiuso',
                'completed'             => 'Completato',
                'discount'              => 'Sconto - :discount',
                'download-pdf'          => 'Scarica PDF',
<<<<<<< HEAD
                'grand-total'           => 'Totale Generale - :grand-total ',
                'summary-grand-total'   => 'Totale Generale',
                'item-ordered'          => 'Ordinati (:qty_ordered)',
                'item-invoice'          => 'Fatturati (:qty_invoiced)',
                'item-shipped'          => 'Spediti (:qty_shipped)',
                'item-canceled'         => 'Annullati (:qty_canceled)',
                'item-refunded'         => 'Rimborsati (:qty_refunded)',
=======
                'grand-total'           => 'Totale Generale - :grand_total',
                'item-ordered'          => 'Ordinato (:qty_ordered)',
                'item-invoice'          => 'Fatturato (:qty_invoiced)',
                'item-shipped'          => 'Spedito (:qty_shipped)',
                'item-canceled'         => 'Annullato (:qty_canceled)',
                'item-refunded'         => 'Rimborsato (:qty_refunded)',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'invoice-id'            => 'Fattura #:invoice',
                'invoices'              => 'Fatture',
                'notify-customer'       => 'Avvisa Cliente',
                'no-invoice-found'      => 'Nessuna Fattura Trovata',
                'no-shipment-found'     => 'Nessuna Spedizione Trovata',
                'name'                  => 'Nome',
                'no-refund-found'       => 'Nessun Rimborso Trovato',
                'order-date'            => 'Data Ordine',
                'order-status'          => 'Stato Ordine',
                'order-information'     => 'Informazioni sull\'Ordine',
                'payment-and-shipping'  => 'Pagamento e Spedizione',
                'price'                 => 'Prezzo - :price',
                'payment-method'        => 'Metodo di Pagamento',
                'per-unit'              => 'Per Unità',
<<<<<<< HEAD
                'pending'               => 'In attesa',
                'processing'            => 'Elaborazione',
=======
                'pending'               => 'In Attesa',
                'processing'            => 'In Elaborazione',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'quantity'              => 'Quantità',
                'refunded'              => 'Rimborsato',
                'refund-id'             => 'Rimborso #:refund',
                'refund'                => 'Rimborso',
<<<<<<< HEAD
=======
                'summary-grand-total'   => 'Totale Generale',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'ship'                  => 'Spedisci',
                'shipment'              => 'Spedizione #:shipment',
                'sku'                   => 'SKU - :sku',
                'sub-total'             => 'Subtotale - :sub_total',
                'summary-sub-total'     => 'Subtotale',
                'summary-tax'           => 'Imposta',
                'shipping-and-handling' => 'Spedizione e Gestione',
                'submit-comment'        => 'Invia Commento',
                'shipments'             => 'Spedizioni',
                'shipping-method'       => 'Metodo di Spedizione',
<<<<<<< HEAD
                'shipping-price'        => 'Costo di Spedizione',
=======
                'shipping-price'        => 'Costo Spedizione',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'shipping-address'      => 'Indirizzo di Spedizione',
                'status'                => 'Stato',
                'title'                 => 'Ordine #:order_id',
                'tax'                   => 'Imposta - :tax',
                'total-paid'            => 'Totale Pagato',
                'total-refund'          => 'Totale Rimborso',
                'total-due'             => 'Totale Dovuto',
<<<<<<< HEAD
                'view'                  => 'Vedi',
=======
                'view'                  => 'Visualizza',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'write-your-comment'    => 'Scrivi il tuo commento',
            ],
        ],

        'shipments' => [
            'index' => [
                'title' => 'Spedizioni',

                'datagrid'  => [
                    'id'               => 'ID',
<<<<<<< HEAD
                    'inventory-source' => 'Sorgente Inventario',
                    'order-id'         => 'ID Ordine',
                    'order-date'       => 'Data Ordine',
                    'shipment-date'    => 'Data Spedizione',
                    'shipment-to'      => 'Spedizione A',
                    'total-qty'        => 'Quantità Totale',
                    'view'             => 'Vedi',
=======
                    'inventory-source' => 'Origine Inventario',
                    'order-id'         => 'ID Ordine',
                    'order-date'       => 'Data Ordine',
                    'shipment-date'    => 'Data Spedizione',
                    'shipment-to'      => 'Spedizione a',
                    'total-qty'        => 'Quantità Totale',
                    'view'             => 'Visualizza',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                ],
            ],

            'create' => [
                'amount-per-unit'  => ':amount Per Unità x :qty Quantità',
<<<<<<< HEAD
                'cancel-error'     => 'Ordine non può essere annullato',
                'carrier-name'     => 'Nome Trasportatore',
                'creation-error'   => 'Errore nella creazione della Spedizione',
                'create-btn'       => 'Crea Spedizione',
                'item-ordered'     => 'Ordinati (:qty_ordered)',
                'item-invoice'     => 'Fatturati (:qty_invoiced)',
                'item-shipped'     => 'Spediti (:qty_shipped)',
                'item-canceled'    => 'Annullati (:qty_canceled)',
                'item-refunded'    => 'Rimborsati (:qty_refunded)',
                'order-error'      => 'La Spedizione non è valida',
                'per-unit'         => 'Per Unità',
                'qty-to-ship'      => 'Qtà. Da Spedire',
                'qty-available'    => 'Qtà. Disponibile',
                'quantity-invalid' => 'Qtà. Non Valida',
                'source'           => 'Origine',
                'sku'              => 'SKU - :sku',
                'success'          => 'Spedizione creata con successo',
                'title'            => 'Crea Nuova Spedizione',
                'tracking-number'  => 'Numero di Tracking',
=======
                'cancel-error'     => 'L\'ordine non può essere annullato',
                'carrier-name'     => 'Nome Trasportatore',
                'creation-error'   => 'Errore nella creazione della spedizione',
                'create-btn'       => 'Crea Spedizione',
                'item-ordered'     => 'Ordinato (:qty_ordered)',
                'item-invoice'     => 'Fatturato (:qty_invoiced)',
                'item-shipped'     => 'Spedito (:qty_shipped)',
                'item-canceled'    => 'Annullato (:qty_canceled)',
                'item-refunded'    => 'Rimborsato (:qty_refunded)',
                'order-error'      => 'La spedizione non è valida',
                'per-unit'         => 'Per Unità',
                'qty-to-ship'      => 'Quantità da Spedire',
                'qty-available'    => 'Quantità Disponibile',
                'quantity-invalid' => 'Quantità Non Valida',
                'source'           => 'Origine',
                'sku'              => 'SKU - :sku',
                'success'          => 'Spedizione creata con successo',
                'title'            => 'Crea nuova Spedizione',
                'tracking-number'  => 'Numero di Tracciamento',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ],

            'view' => [
                'billing-address'      => 'Indirizzo di Fatturazione',
<<<<<<< HEAD
                'carrier-title'        => 'Titolo Trasportatore',
=======
                'carrier-title'        => 'Titolo del Trasportatore',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'currency'             => 'Valuta',
                'channel'              => 'Canale',
                'customer'             => 'Cliente',
                'email'                => 'Email - :email',
<<<<<<< HEAD
                'inventory-source'     => 'Sorgente Inventario',
=======
                'inventory-source'     => 'Origine Inventario',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'ordered-items'        => 'Articoli Ordinati',
                'order-information'    => 'Informazioni sull\'Ordine',
                'order-id'             => 'ID Ordine',
                'order-date'           => 'Data Ordine',
                'order-status'         => 'Stato Ordine',
                'product-image'        => 'Immagine Prodotto',
                'payment-and-shipping' => 'Pagamento e Spedizione',
                'payment-method'       => 'Metodo di Pagamento',
                'qty'                  => 'Quantità - :qty',
                'sku'                  => 'SKU - :sku ',
                'shipping-address'     => 'Indirizzo di Spedizione',
                'shipping-method'      => 'Metodo di Spedizione',
<<<<<<< HEAD
                'shipping-price'       => 'Costo di Spedizione',
                'title'                => 'Spedizione #:shipment_id',
                'tracking-number'      => 'Numero di Tracking',
=======
                'shipping-price'       => 'Costo Spedizione',
                'title'                => 'Spedizione #:shipment_id',
                'tracking-number'      => 'Numero di Tracciamento',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ],
        ],

        'refunds' => [
            'index' => [
                'title' => 'Rimborsi',

                'datagrid'  => [
<<<<<<< HEAD
                    'billed-to'   => 'Fatturato A',
=======
                    'billed-to'   => 'Fatturato a',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'id'          => 'ID',
                    'order-id'    => 'ID Ordine',
                    'refund-date' => 'Data Rimborso',
                    'refunded'    => 'Rimborsato',
<<<<<<< HEAD
                    'view'        => 'Vedi',
=======
                    'view'        => 'Visualizza',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                ],
            ],

            'view' => [
<<<<<<< HEAD
                'account-information'    => 'Informazioni dell\'Account',
                'adjustment-refund'      => 'Rimborso di Regolazione',
                'adjustment-fee'         => 'Tariffa di Regolazione',
                'base-discounted-amount' => 'Importo Scontato - :base-discounted-amount',
                'billing-address'        => 'Indirizzo di Fatturazione',
                'currency'               => 'Valuta',
                'discounted-amount'      => 'Sub Totale - :discounted-amount',
                'grand-total'            => 'Totale Generale',
                'order-information'      => 'Informazioni sull\'Ordine',
                'order-id'               => 'ID Ordine',
                'order-status'           => 'Stato dell\'Ordine',
                'order-date'             => 'Data dell\'Ordine',
                'order-channel'          => 'Canale dell\'Ordine',
                'product-ordered'        => 'Prodotti Ordinati',
                'product-image'          => 'Immagine del Prodotto',
                'payment-information'    => 'Informazioni di Pagamento',
                'payment-method'         => 'Metodo di Pagamento',
                'price'                  => 'Prezzo - :price',
                'qty'                    => 'QTY - :qty',
                'refund'                 => 'Rimborso',
                'shipping-address'       => 'Indirizzo di Spedizione',
                'sub-total'              => 'Sub Totale',
                'shipping-handling'      => 'Spedizione e Gestione',
                'sku'                    => 'SKU - :sku',
                'shipping-method'        => 'Metodo di Spedizione',
                'shipping-price'         => 'Costo di Spedizione',
                'tax-amount'             => 'Importo Tasse - :tax-amount',
                'title'                  => 'Rimborso #:refund_id',
                'tax'                    => 'Tasse',
=======
                'account-information'    => 'Informazioni sull\'Account',
                'adjustment-refund'      => 'Rimborso di Adeguamento',
                'adjustment-fee'         => 'Commissione di Adeguamento',
                'base-discounted-amount' => 'Importo Scontato - :base_discounted_amount',
                'billing-address'        => 'Indirizzo di Fatturazione',
                'currency'               => 'Valuta',
                'discounted-amount'      => 'Subtotale - :discounted_amount',
                'grand-total'            => 'Totale Generale',
                'order-information'      => 'Informazioni sull\'Ordine',
                'order-id'               => 'ID Ordine',
                'order-status'           => 'Stato Ordine',
                'order-date'             => 'Data Ordine',
                'order-channel'          => 'Canale Ordine',
                'product-ordered'        => 'Prodotti Ordinati',
                'product-image'          => 'Immagine Prodotto',
                'payment-information'    => 'Informazioni di Pagamento',
                'payment-method'         => 'Metodo di Pagamento',
                'price'                  => 'Prezzo - :price',
                'qty'                    => 'QTA - :qty',
                'refund'                 => 'Rimborso',
                'shipping-address'       => 'Indirizzo di Spedizione',
                'sub-total'              => 'Subtotale',
                'shipping-handling'      => 'Spedizione & Gestione',
                'sku'                    => 'SKU - :sku',
                'shipping-method'        => 'Metodo di Spedizione',
                'shipping-price'         => 'Costo Spedizione',
                'tax-amount'             => 'Importo Imposta - :tax_amount',
                'title'                  => 'Rimborso #:refund_id',
                'tax'                    => 'Imposta',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ],

            'create' => [
                'amount-per-unit'             => ':amount Per Unità x :qty Quantità',
<<<<<<< HEAD
                'adjustment-refund'           => 'Rimborso di Regolazione',
                'adjustment-fee'              => 'Tariffa di Regolazione',
                'create-success'              => 'Rimborso creato con successo',
                'discount-amount'             => 'Importo Sconto',
                'grand-total'                 => 'Totale Generale',
                'item-ordered'                => 'Ordinati (:qty_ordered)',
                'item-invoice'                => 'Fatturati (:qty_invoiced)',
                'item-shipped'                => 'Spediti (:qty_shipped)',
                'item-canceled'               => 'Annullati (:qty_canceled)',
                'item-refunded'               => 'Rimborsati (:qty_refunded)',
                'invalid-refund-amount-error' => 'L\'importo del rimborso deve essere diverso da zero.',
                'invalid-qty'                 => 'Abbiamo riscontrato una quantità non valida per gli articoli da fatturare.',
                'per-unit'                    => 'Per Unità',
                'price'                       => 'Prezzo',
                'qty-to-refund'               => 'Q.tà da Rimborsare',
                'refund-shipping'             => 'Rimborso Spedizione',
                'refund-limit-error'          => 'Importo Rimborso :amount non può procedere.',
                'refund-btn'                  => 'Rimborso',
                'subtotal'                    => 'Sub Totale',
                'sku'                         => 'SKU - :sku',
                'title'                       => 'Crea Rimborso',
                'tax-amount'                  => 'Importo Tasse',
=======
                'adjustment-refund'           => 'Rimborso di Adeguamento',
                'adjustment-fee'              => 'Commissione di Adeguamento',
                'create-success'              => 'Rimborso creato con successo',
                'discount-amount'             => 'Importo Sconto',
                'grand-total'                 => 'Totale Generale',
                'item-ordered'                => 'Ordinato (:qty_ordered)',
                'item-invoice'                => 'Fatturato (:qty_invoiced)',
                'item-shipped'                => 'Spedito (:qty_shipped)',
                'item-canceled'               => 'Annullato (:qty_canceled)',
                'item-refunded'               => 'Rimborsato (:qty_refunded)',
                'invalid-refund-amount-error' => 'L\'importo del rimborso deve essere diverso da zero.',
                'invalid-qty'                 => 'Abbiamo riscontrato una quantità non valida per la fatturazione degli articoli.',
                'per-unit'                    => 'Per Unità',
                'price'                       => 'Prezzo',
                'qty-to-refund'               => 'QTA da rimborsare',
                'refund-shipping'             => 'Rimborsa Spedizione',
                'refund-limit-error'          => 'L\'importo del rimborso :amount non può essere elaborato.',
                'refund-btn'                  => 'Rimborsa',
                'subtotal'                    => 'Subtotale',
                'sku'                         => 'SKU - :sku',
                'title'                       => 'Crea Rimborso',
                'tax-amount'                  => 'Importo Imposta',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'update-quantity-btn'         => 'Aggiorna Quantità',
            ],
        ],

        'invoices' => [
            'index' => [
                'title' => 'Fatture',

                'datagrid' => [
                    'action'       => 'Azioni',
                    'id'           => 'ID',
                    'invoice-date' => 'Data Fattura',
<<<<<<< HEAD
                    'grand-total'  => 'Totale Generale',
                    'order-id'     => 'ID Ordine',
                    'overdue'      => 'Scaduto',
                    'paid'         => 'Pagato',
                    'pending'      => 'In attesa',
=======
                    'grand-total'  => 'Totale Fattura',
                    'order-id'     => 'ID Ordine',
                    'overdue'      => 'In Ritardo',
                    'paid'         => 'Pagato',
                    'pending'      => 'In Sospeso',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'status'       => 'Stato',
                ],
            ],

            'view' => [
                'amount-per-unit'        => ':amount Per Unità x :qty Quantità',
                'channel'                => 'Canale',
                'customer'               => 'Cliente',
                'discount'               => 'Importo Sconto - :discount',
<<<<<<< HEAD
                'customer-email'         => 'Email del cliente - :email',
                'email'                  => 'Email',
                'grand-total'            => 'Totale Generale',
                'invoice-items'          => 'Elementi Fattura',
=======
                'customer-email'         => 'Email - :email',
                'email'                  => 'Email',
                'grand-total'            => 'Totale Fattura',
                'invoice-items'          => 'Voci Fattura',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'invoice-status'         => 'Stato Fattura',
                'invoice-sent'           => 'Fattura inviata con successo',
                'order-information'      => 'Informazioni Ordine',
                'order-id'               => 'ID Ordine',
                'order-date'             => 'Data Ordine',
                'order-status'           => 'Stato Ordine',
                'price'                  => 'Prezzo - :price',
                'print'                  => 'Stampa',
                'product-image'          => 'Immagine Prodotto',
                'qty'                    => 'Quantità - :qty',
                'shipping-and-handling'  => 'Spedizione e Gestione',
                'send-duplicate-invoice' => 'Invia Fattura Duplicata',
                'send'                   => 'Invia',
                'send-btn'               => 'Invia',
                'sku'                    => 'SKU - :sku',
<<<<<<< HEAD
                'sub-total'              => 'Sub Totale - :sub-total',
                'sub-total-summary'      => 'Sub Totale',
                'summary-tax'            => 'Importo delle tasse',
                'summary-discount'       => 'Importo dello sconto',
=======
                'sub-total'              => 'Subtotale - :sub_total',
                'sub-total-summary'      => 'Subtotale',
                'summary-tax'            => 'Importo Tasse',
                'summary-discount'       => 'Importo Sconto',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'title'                  => 'Fattura #:invoice_id',
                'tax'                    => 'Importo Tasse - :tax',
            ],

<<<<<<< HEAD
            'create' => [
                'amount-per-unit' => ':amount Per Unità x :qty Quantità',
                'create-invoice'  => 'Crea Fattura',
                'creation-error'  => "La creazione della fattura dell'ordine non è consentita.",
                'create-success'  => 'Fattura creata con successo',
                'invoice'         => 'Fattura',
                'invalid-qty'     => 'Abbiamo trovato una quantità non valida per gli articoli da fatturare.',
                'new-invoice'     => 'Nuova Fattura',
                'product-image'   => 'Immagine Prodotto',
                'product-error'   => 'Non è possibile creare una fattura senza prodotti.',
                'qty-to-invoiced' => 'Quantità da fatturare',
=======
            'create'   => [
                'amount-per-unit' => ':amount Per Unità x :qty Quantità',
                'create-invoice'  => 'Crea Fattura',
                'creation-error'  => 'La creazione della fattura dell\'ordine non è consentita.',
                'create-success'  => 'Fattura creata con successo',
                'invoice'         => 'Fattura',
                'invalid-qty'     => 'Abbiamo trovato una quantità non valida per la fatturazione degli articoli.',
                'new-invoice'     => 'Nuova Fattura',
                'product-image'   => 'Immagine Prodotto',
                'product-error'   => 'La fattura non può essere creata senza prodotti.',
                'qty-to-invoiced' => 'Qtà. da fatturare',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'sku'             => 'SKU - :sku',
            ],

            'invoice-pdf' => [
<<<<<<< HEAD
                'bill-to'           => 'Fatturato a',
                'bank-details'      => 'Dettagli Bancari',
                'contact'           => 'Contatto',
                'contact-number'    => 'Numero di Contatto',
                'date'              => 'Data Fattura',
                'discount'          => 'Sconto',
=======
                'bill-to'           => 'Da fatturare a',
                'bank-details'      => 'Dettagli Bancari',
                'contact'           => 'Contatto',
                'contact-number'    => 'Numero di Contatto',
                'discount'          => 'Sconto',
                'date'              => 'Data Fattura',
                'grand-total'       => 'Totale Fattura',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'invoice'           => 'Fattura',
                'invoice-id'        => 'ID Fattura',
                'order-id'          => 'ID Ordine',
                'order-date'        => 'Data Ordine',
                'payment-method'    => 'Metodo di Pagamento',
                'payment-terms'     => 'Termini di Pagamento',
                'product-name'      => 'Nome Prodotto',
                'price'             => 'Prezzo',
                'qty'               => 'Quantità',
<<<<<<< HEAD
                'grand-total'       => 'Totale Generale',
                'ship-to'           => 'Spedito a',
=======
                'ship-to'           => 'Spedisci a',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'shipping-method'   => 'Metodo di Spedizione',
                'sku'               => 'SKU',
                'subtotal'          => 'Subtotale',
                'shipping-handling' => 'Spedizione e Gestione',
                'tax-amount'        => 'Importo Tasse',
                'tax'               => 'Tasse',
<<<<<<< HEAD
                'vat-number'        => 'Numero IVA',
=======
                'vat-number'        => 'Numero Partita IVA',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ],
        ],

        'invoice-transaction'  => [
            'id'               => 'ID',
            'transaction-date' => 'Data Transazione',
            'transaction-id'   => 'ID Transazione',
<<<<<<< HEAD
            'view'             => 'Visualizza',
=======
            'view'             => 'Vista',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ],

        'transactions' => [
            'index' => [
<<<<<<< HEAD
                'create-btn'  => 'Crea Transazioni',
                'title'       => 'Transazioni',
=======
                'create-btn' => 'Crea Transazioni',
                'title'      => 'Transazioni',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

                'datagrid' => [
                    'id'                 => 'ID',
                    'invoice-id'         => 'ID Fattura',
                    'order-id'           => 'ID Ordine',
                    'status'             => 'Stato',
                    'transaction-id'     => 'ID Transazione',
                    'transaction-date'   => 'Data',
                    'transaction-amount' => 'Importo',
<<<<<<< HEAD
                ],

                'edit'  => [
                    'already-paid'               => 'Già pagato',
                    'invoice-missing'            => 'Fattura Mancante',
                    'transaction-amount-zero'    => 'Importo Transazione zero',
                    'transaction-amount-exceeds' => 'Importo Transazione supera',
                    'transaction-saved'          => 'Transazione salvata con successo',
=======
                    'view'               => 'Vista',
                ],

                'create'  => [
                    'already-paid'               => 'Già Pagato',
                    'invoice-missing'            => 'Fattura Mancante',
                    'transaction-amount-zero'    => 'Importo Transazione zero',
                    'transaction-amount-exceeds' => 'Importo Transazione supera',
                ],

                'view' => [
                    'title'            => 'Dettagli Transazione',
                    'transaction-data' => 'Dati Transazione',
                    'transaction-id'   => 'ID Transazione ',
                    'order-id'         => 'ID Ordine',
                    'invoice-id'       => 'ID Fattura',
                    'payment-method'   => 'Metodo di Pagamento',
                    'created-at'       => 'Creato il',
                    'status'           => 'Stato',
                    'payment-details'  => 'Dettagli Pagamento',
                    'amount'           => 'Importo',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                ],
            ],
        ],
    ],

    'catalog' => [
        'products' => [
            'index' => [
<<<<<<< HEAD
                'create-btn'    => 'Crea Prodotto',
                'title'         => 'Prodotti',
                'already-taken' => ':name è già stato preso.',

                'create'     => [
=======
                'already-taken' => 'Il :name è già stato preso.',
                'create-btn'    => 'Crea Prodotto',
                'title'         => 'Prodotti',

                'create' => [
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'back-btn'                => 'Indietro',
                    'bundle'                  => 'Bundle',
                    'configurable'            => 'Configurabile',
                    'configurable-attributes' => 'Attributi Configurabili',
                    'create-btn'              => 'Crea Prodotto',
                    'downloadable'            => 'Scaricabile',
                    'family'                  => 'Famiglia',
                    'grouped'                 => 'Raggruppato',
                    'simple'                  => 'Semplice',
                    'save-btn'                => 'Salva Prodotto',
                    'sku'                     => 'SKU',
                    'title'                   => 'Crea Nuovo Prodotto',
                    'type'                    => 'Tipo',
                    'virtual'                 => 'Virtuale',
                ],

                'datagrid'   => [
<<<<<<< HEAD
                    'attribute-family'       => 'Famiglia di Attributi',
                    'attribute-family-value' => 'Famiglia di Attributi - :attribute_family',
                    'active'                 => 'Attivo',
                    'category'               => 'Categoria',
                    'copy-of'                => 'Copia di :value',
                    'copy-of-slug'           => 'Copia di :value',
                    'disable'                => 'Disabilita',
                    'delete'                 => 'Elimina',
                    'image'                  => 'Immagine',
                    'id'                     => 'ID',
                    'id-value'               => 'ID - :id',
                    'name'                   => 'Nome',
                    'out-of-stock'           => 'Esaurito',
                    'price'                  => 'Prezzo',
                    'product-image'          => 'Immagine Prodotto',
                    'qty'                    => 'Quantità',
                    'qty-value'              => ':qty Disponibili',
                    'sku-value'              => 'SKU - :sku',
                    'sku'                    => 'SKU',
                    'status'                 => 'Stato',
                    'type'                   => 'Tipo',
                    'update-status'          => 'Aggiorna Stato',
                    'mass-update-success'    => 'Prodotti Selezionati Aggiornati con Successo',
                    'mass-delete-success'    => 'Prodotti Selezionati Eliminati con Successo',
=======
                    'attribute-family'              => 'Famiglia di Attributi',
                    'attribute-family-value'        => 'Famiglia di Attributi - :attribute_family',
                    'active'                        => 'Attivo',
                    'category'                      => 'Categoria',
                    'copy-of'                       => 'Copia di :value',
                    'copy-of-slug'                  => 'copia-di-:value',
                    'disable'                       => 'Disabilita',
                    'delete'                        => 'Elimina',
                    'image'                         => 'Immagine',
                    'id'                            => 'ID',
                    'id-value'                      => 'ID - :id',
                    'mass-update-success'           => 'Prodotti Selezionati Aggiornati con Successo',
                    'mass-delete-success'           => 'Prodotti Selezionati Eliminati con Successo',
                    'name'                          => 'Nome',
                    'out-of-stock'                  => 'Esaurito',
                    'price'                         => 'Prezzo',
                    'product-image'                 => 'Immagine Prodotto',
                    'qty'                           => 'Quantità',
                    'qty-value'                     => ':qty Disponibili',
                    'sku-value'                     => 'SKU - :sku',
                    'sku'                           => 'SKU',
                    'status'                        => 'Stato',
                    'type'                          => 'Tipo',
                    'update-status'                 => 'Aggiorna Stato',
                    'variant-already-exist-message' => 'La variante con le stesse opzioni degli attributi esiste già.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                ],
            ],

            'edit' => [
<<<<<<< HEAD
                'save-btn' => 'Salva Prodotto',
                'title'    => 'Modifica Prodotto',
                'remove'   => 'Rimuovi',

                'price' => [
                    'group' => [
                        'title'                     => 'Prezzo per Gruppo Clienti',
                        'create-btn'                => 'Aggiungi Nuovo',
                        'edit-btn'                  => 'Modifica',
                        'add-group-price'           => 'Aggiungi Prezzo Gruppo',
                        'all-groups'                => 'Tutti i gruppi',
                        'fixed-group-price-info'    => 'Per :qty Qtà a prezzo fisso di :price',
                        'discount-group-price-info' => 'Per :qty Qtà con sconto di :price',
                        'empty-info'                => 'Prezzi speciali per clienti appartenenti a un gruppo specifico.',

                        'create' => [
                            'create-title'   => 'Crea Prezzo Gruppo Clienti',
                            'customer-group' => 'Gruppo Clienti',
                            'all-groups'     => 'Tutti i gruppi',
                            'discount'       => 'Sconto',
                            'delete-btn'     => 'Elimina',
                            'fixed'          => 'Fisso',
                            'price-type'     => 'Tipo di Prezzo',
                            'price'          => 'Prezzo',
                            'qty'            => 'Qtà',
                            'save-btn'       => 'Salva',
                            'update-title'   => 'Aggiorna Prezzo Gruppo Clienti',
=======
                'preview'  => 'Anteprima',
                'remove'   => 'Rimuovi',
                'save-btn' => 'Salva Prodotto',
                'title'    => 'Modifica Prodotto',

                'price' => [
                    'group' => [
                        'add-group-price'           => 'Aggiungi Prezzo di Gruppo',
                        'all-groups'                => 'Tutti i Gruppi',
                        'create-btn'                => 'Aggiungi Nuovo',
                        'discount-group-price-info' => 'Per :qty Qtà con sconto di :price',
                        'edit-btn'                  => 'Modifica',
                        'empty-info'                => 'Prezzi speciali per i clienti appartenenti a un gruppo specifico.',
                        'fixed-group-price-info'    => 'Per :qty Qtà a prezzo fisso di :price',
                        'title'                     => 'Prezzo di Gruppo Cliente',

                        'create' => [
                            'all-groups'     => 'Tutti i Gruppi',
                            'create-title'   => 'Crea Prezzo di Gruppo Cliente',
                            'customer-group' => 'Gruppo Cliente',
                            'discount'       => 'Sconto',
                            'delete-btn'     => 'Elimina',
                            'fixed'          => 'Fisso',
                            'price-type'     => 'Tipo Prezzo',
                            'price'          => 'Prezzo',
                            'qty'            => 'Qtà Minima',
                            'save-btn'       => 'Salva',
                            'update-title'   => 'Aggiorna Prezzo di Gruppo Cliente',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        ],
                    ],
                ],

                'inventories' => [
                    'pending-ordered-qty'      => 'Qtà Ordinata in Sospeso: :qty',
<<<<<<< HEAD
                    'pending-ordered-qty-info' => 'La quantità ordinata in sospeso sarà detratta dalla rispettiva fonte di inventario dopo la spedizione. In caso di annullamento, la quantità in sospeso sarà disponibile per la vendita.',
                    'title'                    => 'Inventario',
=======
                    'pending-ordered-qty-info' => 'La quantità ordinata in sospeso verrà dedotta dalla relativa fonte di inventario dopo la spedizione. In caso di cancellazione, la quantità in sospeso sarà nuovamente disponibile per la vendita.',
                    'title'                    => 'Inventari',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                ],

                'categories' => [
                    'title' => 'Categorie',
                ],

                'images' => [
<<<<<<< HEAD
                    'title' => 'Immagini',
                    'info'  => 'La risoluzione dell\'immagine dovrebbe essere di 609px X 560px',
                ],

                'videos' => [
                    'title' => 'Video',
                    'info'  => 'La dimensione massima del video dovrebbe essere di :size',
=======
                    'info'  => 'La risoluzione dell\'immagine dovrebbe essere di 609px X 560px',
                    'title' => 'Immagini',
                ],

                'videos' => [
                    'info'  => 'La dimensione massima del video dovrebbe essere di :size',
                    'title' => 'Video',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                ],

                'links' => [
                    'related-products' => [
<<<<<<< HEAD
                        'empty-info' => 'Aggiungi prodotti correlati mentre sei in viaggio.',
=======
                        'empty-info' => 'Aggiungi prodotti correlati al volo.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        'info'       => 'Oltre al prodotto che il cliente sta visualizzando, vengono presentati prodotti correlati.',
                        'title'      => 'Prodotti Correlati',
                    ],

                    'up-sells' => [
<<<<<<< HEAD
                        'empty-info' => 'Aggiungi prodotti di vendita aggiuntiva mentre sei in movimento.',
                        'info'       => 'Al cliente vengono presentati prodotti upsell, che fungono da alternativa premium o di qualità superiore al prodotto che stanno visualizzando.',
                        'title'      => 'Prodotti Upsell',
                    ],

                    'cross-sells' => [
                        'empty-info' => 'Aggiungi prodotti di cross-selling mentre sei in movimento.',
                        'info'       => 'Accanto al carrello della spesa, troverai questi prodotti "acquisto d\'impulso" posizionati come cross-sell per completare gli articoli già aggiunti al tuo carrello.',
                        'title'      => 'Prodotti Cross-Sell',
=======
                        'empty-info' => 'Aggiungi prodotti in vendita al volo.',
                        'info'       => 'Il cliente viene presentato con prodotti in vendita, che fungono da alternativa premium o di alta qualità al prodotto che stanno visualizzando.',
                        'title'      => 'Prodotti in Vendita',
                    ],

                    'cross-sells' => [
                        'empty-info' => 'Aggiungi prodotti suggeriti al volo.',
                        'info'       => 'Accanto al carrello della spesa, troverai questi prodotti "acquista impulsivo" posizionati come suggerimenti per completare gli articoli già aggiunti al carrello.',
                        'title'      => 'Prodotti Suggeriti',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    ],

                    'add-btn'           => 'Aggiungi Prodotto',
                    'delete'            => 'Elimina',
                    'empty-title'       => 'Aggiungi Prodotto',
<<<<<<< HEAD
                    'empty-info'        => 'Per aggiungere prodotti :type in un colpo solo.',
                    'sku'               => 'SKU - :sku',
                    'image-placeholder' => 'Immagine Prodotto',
=======
                    'empty-info'        => 'Per aggiungere prodotti di tipo :type al volo.',
                    'image-placeholder' => 'Immagine Prodotto',
                    'sku'               => 'SKU - :sku',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                ],

                'types' => [
                    'configurable' => [
                        'add-btn'           => 'Aggiungi Variante',
                        'delete-btn'        => 'Elimina',
                        'edit-btn'          => 'Modifica',
                        'empty-title'       => 'Aggiungi Variante',
<<<<<<< HEAD
                        'empty-info'        => 'Per creare varie combinazioni di prodotti rapidamente.',
                        'info'              => 'I prodotti con variazioni dipendono da tutte le possibili combinazioni degli attributi.',
=======
                        'empty-info'        => 'Per creare varie combinazioni di prodotti al volo.',
                        'info'              => 'I prodotti a variazione dipendono da tutte le possibili combinazioni di attributi.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        'image-placeholder' => 'Immagine Prodotto',
                        'qty'               => ':qty Qtà',
                        'sku'               => 'SKU - :sku',
                        'title'             => 'Varianti',

                        'create'  => [
                            'description'            => 'Descrizione',
                            'name'                   => 'Nome',
                            'save-btn'               => 'Aggiungi',
                            'title'                  => 'Aggiungi Variante',
                            'variant-already-exists' => 'Questa variante esiste già',
                        ],

                        'edit' => [
<<<<<<< HEAD
                            'disabled'        => 'Disabilitato',
                            'edit-info'       => 'Se desideri aggiornare le informazioni dettagliate del prodotto, vai alla',
                            'edit-link-title' => 'Pagina Dettagli Prodotto',
                            'enabled'         => 'Abilitato',
                            'title'           => 'Prodotto',
                            'name'            => 'Nome',
                            'price'           => 'Prezzo',
                            'quantities'      => 'Quantità',
                            'save-btn'        => 'Salva',
                            'sku'             => 'SKU',
                            'status'          => 'Stato',
                            'weight'          => 'Peso',
                            'images'          => 'Immagini',
                        ],

                        'mass-edit' => [
                            'select-variants'  => 'Seleziona Varianti',
                            'select-action'    => 'Seleziona Azione',
                            'edit-prices'      => 'Modifica Prezzi',
                            'edit-inventories' => 'Modifica Inventario',
                            'add-images'       => 'Aggiungi Immagini',
                            'remove-images'    => 'Rimuovi Immagini',
                            'remove-variants'  => 'Rimuovi Varianti',
                            'price'            => 'Prezzo',
                            'apply-to-all-sku' => 'Applica un prezzo a tutte le SKU.',
                            'apply-to-all-btn' => 'Applica a Tutti',
=======
                            'disabled'         => 'Disabilitato',
                            'edit-info'        => 'Se desideri aggiornare le informazioni dettagliate sul prodotto, vai alla',
                            'edit-link-title'  => 'Pagina Dettagli Prodotto',
                            'enabled'          => 'Abilitato',
                            'images'           => 'Immagini',
                            'name'             => 'Nome',
                            'price'            => 'Prezzo',
                            'quantities'       => 'Quantità',
                            'save-btn'         => 'Salva',
                            'sku'              => 'SKU',
                            'status'           => 'Stato',
                            'title'            => 'Prodotto',
                            'weight'           => 'Peso',
                        ],

                        'mass-edit' => [
                            'add-images'          => 'Aggiungi Immagini',
                            'apply-to-all-btn'    => 'Applica a Tutti',
                            'apply-to-all-name'   => 'Applica un nome a tutte le varianti.',
                            'apply-to-all-sku'    => 'Applica un prezzo a tutte le SKU.',
                            'apply-to-all-status' => 'Applica uno stato a tutte le varianti.',
                            'apply-to-all-weight' => 'Applica un peso a tutte le varianti.',
                            'edit-inventories'    => 'Modifica Inventari',
                            'edit-names'          => 'Modifica Nomi',
                            'edit-prices'         => 'Modifica Prezzi',
                            'edit-sku'            => 'Modifica SKU',
                            'edit-status'         => 'Modifica Stato',
                            'edit-weight'         => 'Modifica Peso',
                            'name'                => 'Nome',
                            'price'               => 'Prezzo',
                            'remove-images'       => 'Rimuovi Immagini',
                            'remove-variants'     => 'Rimuovi Varianti',
                            'select-action'       => 'Seleziona Azione',
                            'select-variants'     => 'Seleziona Varianti',
                            'status'              => 'Stato',
                            'variant-name'        => 'Nome Variante',
                            'variant-sku'         => 'SKU Variante',
                            'weight'              => 'Peso',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        ],
                    ],

                    'grouped' => [
                        'add-btn'           => 'Aggiungi Prodotto',
                        'delete'            => 'Elimina',
                        'default-qty'       => 'Qtà Predefinita',
                        'empty-title'       => 'Aggiungi Prodotto',
<<<<<<< HEAD
                        'empty-info'        => 'Per creare varie combinazioni di prodotti rapidamente.',
                        'image-placeholder' => 'Immagine Prodotto',
                        'info'              => 'Un prodotto raggruppato è composto da articoli autonomi presentati come un set, consentendo variazioni o coordinamenti per stagione o tema. Ogni prodotto può essere acquistato singolarmente o come parte del gruppo.',
=======
                        'empty-info'        => 'Per creare varie combinazioni di prodotti al volo.',
                        'image-placeholder' => 'Immagine Prodotto',
                        'info'              => 'Un prodotto raggruppato comprende articoli autonomi presentati come un set, consentendo variazioni o coordinamenti per stagione o tema. Ogni prodotto può essere acquistato singolarmente o come parte del gruppo.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        'sku'               => 'SKU - :sku',
                        'title'             => 'Prodotti Raggruppati',
                    ],

                    'bundle' => [
                        'add-btn'           => 'Aggiungi Opzione',
                        'empty-title'       => 'Aggiungi Opzione',
<<<<<<< HEAD
                        'empty-info'        => 'Per creare opzioni bundle rapidamente.',
                        'image-placeholder' => 'Immagine Prodotto',
                        'info'              => 'Un prodotto bundle è un pacchetto di articoli o servizi multipli venduti insieme a un prezzo speciale, offrendo valore e comodità ai clienti.',
                        'title'             => 'Elementi del Bundle',

                        'update-create' => [
                            'checkbox'    => 'Casella di Controllo',
                            'is-required' => 'Obbligatorio',
=======
                        'empty-info'        => 'Per creare opzioni di bundle al volo.',
                        'image-placeholder' => 'Immagine Prodotto',
                        'info'              => 'Un prodotto bundle è un pacchetto di più articoli o servizi venduti insieme a un prezzo speciale, offrendo valore e convenienza ai clienti.',
                        'title'             => 'Articoli del Bundle',

                        'update-create' => [
                            'checkbox'    => 'Casella di Controllo',
                            'is-required' => 'È Richiesto',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            'multiselect' => 'Selezione Multipla',
                            'name'        => 'Titolo',
                            'no'          => 'No',
                            'radio'       => 'Radio',
                            'select'      => 'Seleziona',
                            'save-btn'    => 'Salva',
                            'title'       => 'Opzione',
                            'type'        => 'Tipo',
                            'yes'         => 'Sì',
                        ],

                        'option' => [
                            'add-btn'     => 'Aggiungi Prodotto',
                            'delete-btn'  => 'Elimina',
                            'default-qty' => 'Qtà Predefinita',
                            'delete'      => 'Elimina',
                            'edit-btn'    => 'Modifica',
                            'empty-title' => 'Aggiungi Prodotto',
<<<<<<< HEAD
                            'empty-info'  => 'Per creare varie combinazioni di prodotti rapidamente.',
=======
                            'empty-info'  => 'Per creare varie combinazioni di prodotti al volo.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            'sku'         => 'SKU - :sku',

                            'types' => [
                                'checkbox' => [
<<<<<<< HEAD
                                    'info'  => 'Imposta il prodotto predefinito usando la casella di controllo',
=======
                                    'info'  => 'Imposta il prodotto predefinito utilizzando la casella di controllo',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    'title' => 'Casella di Controllo',
                                ],

                                'multiselect' => [
<<<<<<< HEAD
                                    'info'  => 'Imposta il prodotto predefinito usando il pulsante di selezione multipla',
=======
                                    'info'  => 'Imposta il prodotto predefinito utilizzando il pulsante della casella di controllo',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    'title' => 'Selezione Multipla',
                                ],

                                'radio' => [
<<<<<<< HEAD
                                    'info'  => 'Imposta il prodotto predefinito usando il pulsante di opzione',
=======
                                    'info'  => 'Imposta il prodotto predefinito utilizzando il pulsante della radio',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    'title' => 'Radio',
                                ],

                                'select' => [
<<<<<<< HEAD
                                    'info'  => 'Imposta il prodotto predefinito usando il pulsante di selezione',
                                    'title' => 'Selezione',
=======
                                    'info'  => 'Imposta il prodotto predefinito utilizzando il pulsante della radio',
                                    'title' => 'Seleziona',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                ],
                            ],
                        ],
                    ],

                    'downloadable' => [
                        'links' => [
                            'add-btn'     => 'Aggiungi Link',
                            'delete-btn'  => 'Elimina',
                            'edit-btn'    => 'Modifica',
                            'empty-title' => 'Aggiungi Link',
<<<<<<< HEAD
                            'empty-info'  => 'Per creare link rapidamente.',
                            'file'        => 'File : ',
                            'info'        => 'Il tipo di prodotto scaricabile consente di vendere prodotti digitali, come eBook, applicazioni software, musica, giochi, ecc.',
                            'sample-file' => 'File Esempio : ',
                            'sample-url'  => 'URL Esempio : ',
=======
                            'empty-info'  => 'Per creare link al volo.',
                            'file'        => 'File : ',
                            'info'        => 'Il tipo di prodotto scaricabile consente di vendere prodotti digitali, come eBook, applicazioni software, musica, giochi, ecc.',
                            'sample-file' => 'File di Esempio : ',
                            'sample-url'  => 'URL di Esempio : ',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            'title'       => 'Link Scaricabili',
                            'url'         => 'URL : ',

                            'update-create' => [
                                'downloads'   => 'Download Consentiti',
<<<<<<< HEAD
                                'file-type'   => 'Tipo di File',
=======
                                'file-type'   => 'Tipo File',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                'file'        => 'File',
                                'name'        => 'Titolo',
                                'price'       => 'Prezzo',
                                'sample-type' => 'Tipo Esempio',
                                'sample'      => 'Esempio',
                                'save-btn'    => 'Salva',
                                'title'       => 'Link',
                                'url'         => 'URL',
                            ],
                        ],

                        'samples' => [
                            'add-btn'     => 'Aggiungi Esempio',
                            'delete-btn'  => 'Elimina',
                            'edit-btn'    => 'Modifica',
                            'empty-title' => 'Aggiungi Esempio',
<<<<<<< HEAD
                            'empty-info'  => 'Per creare campioni rapidamente.',
                            'file'        => 'File : ',
                            'info'        => 'Il tipo di prodotto scaricabile consente di vendere prodotti digitali, come eBook, applicazioni software, musica, giochi, ecc.',
                            'title'       => 'Campioni Scaricabili',
=======
                            'empty-info'  => 'Per creare esempi al volo.',
                            'file'        => 'File : ',
                            'info'        => 'Il tipo di prodotto scaricabile consente di vendere prodotti digitali, come eBook, applicazioni software, musica, giochi, ecc.',
                            'title'       => 'Esempi Scaricabili',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            'url'         => 'URL : ',

                            'update-create' => [
                                'file'        => 'File',
<<<<<<< HEAD
                                'file-type'   => 'Tipo di File',
=======
                                'file-type'   => 'Tipo File',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                'name'        => 'Titolo',
                                'save-btn'    => 'Salva',
                                'title'       => 'Link',
                                'url'         => 'URL',
                            ],
                        ],
                    ],
                ],
            ],

            'create-success'           => 'Prodotto creato con successo',
            'delete-success'           => 'Prodotto eliminato con successo',
<<<<<<< HEAD
            'delete-failed'            => 'Eliminazione del prodotto fallita',
=======
            'delete-failed'            => 'Eliminazione del prodotto non riuscita',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            'product-copied'           => 'Prodotto copiato con successo',
            'saved-inventory-message'  => 'Prodotto salvato con successo',
            'update-success'           => 'Prodotto aggiornato con successo',
        ],

        'attributes' => [
            'index' => [
                'title'      => 'Attributi',
                'create-btn' => 'Crea Attributi',

                'datagrid' => [
                    'id'                  => 'ID',
                    'name'                => 'Nome',
                    'code'                => 'Codice',
                    'type'                => 'Tipo',
                    'required'            => 'Richiesto',
                    'unique'              => 'Unico',
                    'locale-based'        => 'Basato sulla Lingua',
                    'channel-based'       => 'Basato sul Canale',
                    'created-at'          => 'Creato il',
                    'edit'                => 'Modifica',
                    'delete'              => 'Elimina',
                    'mass-delete-success' => 'Attributi Selezionati Eliminati con Successo',
                ],
            ],

            'create'  => [
<<<<<<< HEAD
                'admin'                 => 'Amministratore',
                'add-row'               => 'Aggiungi Riga',
                'add-option'            => 'Aggiungi Opzione',
                'add-attribute-options' => 'Aggiungi Opzioni Attributo',
                'add-options-info'      => 'Per creare varie combinazioni di Opzioni Attributo in un istante.',
                'admin-name'            => 'Nome Amministratore',
=======
                'admin'                 => 'Admin',
                'add-row'               => 'Aggiungi Riga',
                'add-option'            => 'Aggiungi Opzione',
                'add-attribute-options' => 'Aggiungi Opzioni Attributo',
                'add-options-info'      => 'Per creare varie combinazioni di opzioni di attributo al volo.',
                'admin-name'            => 'Nome Admin',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'boolean'               => 'Booleano',
                'back-btn'              => 'Indietro',
                'code'                  => 'Codice Attributo',
                'checkbox'              => 'Casella di Controllo',
                'color'                 => 'Colore',
                'configuration'         => 'Configurazione',
                'create-empty-option'   => 'Crea opzione vuota predefinita',
                'datetime'              => 'Data e Ora',
                'date'                  => 'Data',
                'decimal'               => 'Decimale',
                'email'                 => 'Email',
<<<<<<< HEAD
                'enable-wysiwyg'        => 'Abilita Editor WYSIWYG',
                'file'                  => 'File',
                'general'               => 'Generale',
                'is-required'           => 'Obbligatorio',
                'image'                 => 'Immagine',
                'input-validation'      => 'Validazione Input',
                'is-unique'             => 'Univoco',
                'is-filterable'         => 'Usa nella Navigazione a Livelli',
                'is-configurable'       => 'Usa per Creare Prodotti Configurabili',
                'is-visible-on-front'   => 'Visibile nella Pagina di Visualizzazione del Prodotto sul Front-end',
                'input-options'         => 'Opzioni Input',
                'is-comparable'         => 'Attributo è comparabile',
=======
                'enable-wysiwyg'        => 'Abilita Editor Wysiwyg',
                'file'                  => 'File',
                'general'               => 'Generale',
                'is-required'           => 'Richiesto',
                'image'                 => 'Immagine',
                'input-validation'      => 'Validazione Input',
                'is-unique'             => 'Unico',
                'is-filterable'         => 'Usa nella Navigazione a Livelli',
                'is-configurable'       => 'Usa per Creare Prodotto Configurabile',
                'is-visible-on-front'   => 'Visibile sulla Pagina di Visualizzazione del Prodotto sul Front-end',
                'input-options'         => 'Opzioni di Input',
                'is-comparable'         => 'Attributo comparabile',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'label'                 => 'Etichetta',
                'multiselect'           => 'Selezione Multipla',
                'no'                    => 'No',
                'number'                => 'Numero',
<<<<<<< HEAD
                'price'                 => 'Prezzo',
                'position'              => 'Posizione',
                'regex'                 => 'Espressione Regolare (Regex)',
                'select'                => 'Selezione',
                'select-type'           => 'Tipo Attributo Selezione',
                'save-btn'              => 'Salva Attributo',
                'swatch'                => 'Campione',
                'title'                 => 'Aggiungi Attributo',
                'type'                  => 'Tipo Attributo',
                'text'                  => 'Testo',
                'textarea'              => 'Area di Testo',
                'url'                   => 'URL',
                'use-in-flat'           => 'Crea nella Tabella dei Prodotti Flat',
                'validations'           => 'Validazioni',
                'value-per-locale'      => 'Valore per Locale',
                'value-per-channel'     => 'Valore per Canale',
                'yes'                   => 'Sì',
                'default-value'         => 'Valore predefinito',

                'option'                => [
                    'color'    => 'Campione di Colore',
                    'dropdown' => 'Menù a Tendina',
=======
                'options'               => 'Opzioni',
                'price'                 => 'Prezzo',
                'position'              => 'Posizione',
                'regex'                 => 'Espressione Regolare',
                'select'                => 'Seleziona',
                'select-type'           => 'Seleziona Tipo di Attributo',
                'save-btn'              => 'Salva Attributo',
                'swatch'                => 'Swatch',
                'title'                 => 'Aggiungi Attributo',
                'type'                  => 'Tipo di Attributo',
                'text'                  => 'Testo',
                'textarea'              => 'Area di Testo',
                'url'                   => 'URL',
                'use-in-flat'           => 'Crea nella Tabella Flat dei Prodotti',
                'validations'           => 'Validazioni',
                'value-per-locale'      => 'Valore per Lingua',
                'value-per-channel'     => 'Valore per Canale',
                'yes'                   => 'Sì',
                'default-value'         => 'Valore Predefinito',

                'option'                => [
                    'color'    => 'Campione Colore',
                    'dropdown' => 'Menu a Tendina',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'image'    => 'Campione Immagine',
                    'save-btn' => 'Salva Opzione',
                    'text'     => 'Campione Testo',
                ],
            ],

            'edit'  => [
<<<<<<< HEAD
                'admin'                 => 'Amministratore',
                'add-row'               => 'Aggiungi Riga',
                'add-option'            => 'Aggiungi Opzione',
                'add-attribute-options' => 'Aggiungi Opzioni Attributo',
                'add-options-info'      => 'Per creare varie combinazioni di Opzioni Attributo in un istante.',
                'admin-name'            => 'Nome Amministratore',
=======
                'admin'                 => 'Admin',
                'add-row'               => 'Aggiungi Riga',
                'add-option'            => 'Aggiungi Opzione',
                'add-attribute-options' => 'Aggiungi Opzioni Attributo',
                'add-options-info'      => 'Per creare varie combinazioni di opzioni di attributo al volo.',
                'admin-name'            => 'Nome Admin',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'boolean'               => 'Booleano',
                'back-btn'              => 'Indietro',
                'code'                  => 'Codice Attributo',
                'checkbox'              => 'Casella di Controllo',
                'color'                 => 'Colore',
                'configuration'         => 'Configurazione',
                'create-empty-option'   => 'Crea opzione vuota predefinita',
                'datetime'              => 'Data e Ora',
                'date'                  => 'Data',
                'decimal'               => 'Decimale',
                'email'                 => 'Email',
<<<<<<< HEAD
                'enable-wysiwyg'        => 'Abilita Editor WYSIWYG',
                'file'                  => 'File',
                'general'               => 'Generale',
                'is-required'           => 'Obbligatorio',
                'input-validation'      => 'Validazione Input',
                'image'                 => 'Immagine',
                'is-unique'             => 'Univoco',
                'is-filterable'         => 'Usa nella Navigazione a Livelli',
                'is-configurable'       => 'Usa per Creare Prodotti Configurabili',
                'is-visible-on-front'   => 'Visibile nella Pagina di Visualizzazione del Prodotto sul Front-end',
                'input-options'         => 'Opzioni Input',
                'is-comparable'         => 'Attributo è comparabile',
=======
                'enable-wysiwyg'        => 'Abilita Editor Wysiwyg',
                'file'                  => 'File',
                'general'               => 'Generale',
                'is-required'           => 'Richiesto',
                'input-validation'      => 'Validazione Input',
                'image'                 => 'Immagine',
                'is-unique'             => 'Unico',
                'is-filterable'         => 'Usa nella Navigazione a Livelli',
                'is-configurable'       => 'Usa per Creare Prodotto Configurabile',
                'is-visible-on-front'   => 'Visibile sulla Pagina di Visualizzazione del Prodotto sul Front-end',
                'input-options'         => 'Opzioni di Input',
                'is-comparable'         => 'Attributo comparabile',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'label'                 => 'Etichetta',
                'multiselect'           => 'Selezione Multipla',
                'no'                    => 'No',
                'number'                => 'Numero',
<<<<<<< HEAD
                'price'                 => 'Prezzo',
                'position'              => 'Posizione',
                'regex'                 => 'Espressione Regolare (Regex)',
                'select'                => 'Selezione',
                'select-type'           => 'Tipo Attributo Selezione',
                'save-btn'              => 'Salva Attributo',
                'swatch'                => 'Campione',
                'title'                 => 'Modifica Attributo',
                'type'                  => 'Tipo Attributo',
                'text'                  => 'Testo',
                'textarea'              => 'Area di Testo',
                'url'                   => 'URL',
                'use-in-flat'           => 'Crea nella Tabella dei Prodotti Flat',
                'validations'           => 'Validazioni',
                'value-per-locale'      => 'Valore per Locale',
                'value-per-channel'     => 'Valore per Canale',
                'yes'                   => 'Sì',
                'default-value'         => 'Valore predefinito',

                'option' => [
                    'color'    => 'Campione di Colore',
                    'dropdown' => 'Menù a Tendina',
=======
                'options'               => 'Opzioni',
                'price'                 => 'Prezzo',
                'position'              => 'Posizione',
                'regex'                 => 'Espressione Regolare',
                'select'                => 'Seleziona',
                'select-type'           => 'Seleziona Tipo di Attributo',
                'save-btn'              => 'Salva Attributo',
                'swatch'                => 'Swatch',
                'title'                 => 'Modifica Attributo',
                'type'                  => 'Tipo di Attributo',
                'text'                  => 'Testo',
                'textarea'              => 'Area di Testo',
                'url'                   => 'URL',
                'use-in-flat'           => 'Crea nella Tabella Flat dei Prodotti',
                'validations'           => 'Validazioni',
                'value-per-locale'      => 'Valore per Lingua',
                'value-per-channel'     => 'Valore per Canale',
                'yes'                   => 'Sì',
                'default-value'         => 'Valore Predefinito',

                'option' => [
                    'color'    => 'Campione Colore',
                    'dropdown' => 'Menu a Tendina',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'image'    => 'Campione Immagine',
                    'save-btn' => 'Salva Opzione',
                    'text'     => 'Campione Testo',
                ],
            ],

            'create-success'    => 'Attributo Creato con Successo',
            'update-success'    => 'Attributo Aggiornato con Successo',
            'user-define-error' => 'Impossibile eliminare l\'Attributo di Sistema',
            'delete-success'    => 'Attributo Eliminato con Successo',
<<<<<<< HEAD
            'delete-failed'     => 'Eliminazione dell\'Attributo Fallita',
        ],

        'categories'  => [
=======
            'delete-failed'     => 'Eliminazione dell\'Attributo Non Riuscita',
        ],

        'categories' => [
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            'index' => [
                'title'   => 'Categorie',
                'add-btn' => 'Crea Categoria',

                'datagrid' => [
                    'id'             => 'ID',
                    'name'           => 'Nome',
                    'position'       => 'Posizione',
<<<<<<< HEAD
                    'status'         => 'Visibile nel menu',
                    'active'         => 'Attivo',
                    'inactive'       => 'Inattivo',
=======
                    'status'         => 'Visibile Nel Menu',
                    'active'         => 'Attiva',
                    'inactive'       => 'Inattiva',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'no-of-products' => 'Numero di Prodotti',
                    'edit'           => 'Modifica',
                    'delete'         => 'Elimina',
                    'update-status'  => 'Aggiorna Stato',
<<<<<<< HEAD
                    'delete-success' => ':resource selezionate sono state eliminate con successo',
=======
                    'delete-success' => 'Le :resource selezionate sono state eliminate con successo',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                ],
            ],

            'create' => [
                'add-logo'                 => 'Aggiungi Logo',
                'add-banner'               => 'Aggiungi Banner',
                'banner'                   => 'Banner',
<<<<<<< HEAD
                'banner-size'              => 'Proporzioni del banner (1320px X 300px)',
                'back-btn'                 => 'Indietro',
                'name'                     => 'Nome Azienda',
                'description'              => 'Descrizione',
                'description-and-images'   => 'Descrizione e Immagini',
                'description-only'         => 'Solo Descrizione',
                'display-mode'             => 'Modalità di Visualizzazione',
                'enter-position'           => 'Inserisci Posizione',
                'filterable-attributes'    => 'Attributi Filtrabili',
                'general'                  => 'Generale',
                'logo'                     => 'Logo',
                'logo-size'                => 'La risoluzione del logo dovrebbe essere (110px X 110px)',
                'meta-description'         => 'Meta Descrizione',
                'meta-keywords'            => 'Meta Parole Chiave',
                'meta-title'               => 'Meta Titolo',
                'parent-category'          => 'Categoria Genitore',
                'position'                 => 'Posizione',
                'products-and-description' => 'Prodotti e Descrizione',
                'products-only'            => 'Solo Prodotti',
                'save-btn'                 => 'Salva Categoria',
                'slug'                     => 'Slug',
                'settings'                 => 'Impostazioni',
                'seo-details'              => 'Dettagli SEO',
                'select-display-mode'      => 'Seleziona Modalità di Visualizzazione',
                'title'                    => 'Aggiungi Nuova Categoria',
                'visible-in-menu'          => 'Visibile Nel Menu',
            ],

            'edit'  => [
                'add-logo'                 => 'Aggiungi Logo',
                'add-banner'               => 'Aggiungi Banner',
                'banner'                   => 'Banner',
                'banner-size'              => 'Proporzioni del banner (1320px X 300px)',
=======
                'banner-size'              => 'Proporzione del banner (1320px X 300px)',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'back-btn'                 => 'Indietro',
                'name'                     => 'Nome',
                'description'              => 'Descrizione',
                'description-and-images'   => 'Descrizione e Immagini',
                'description-only'         => 'Solo Descrizione',
                'display-mode'             => 'Modalità di Visualizzazione',
                'enter-position'           => 'Inserisci Posizione',
                'filterable-attributes'    => 'Attributi Filtrabili',
                'general'                  => 'Generale',
                'logo'                     => 'Logo',
                'logo-size'                => 'La risoluzione del logo dovrebbe essere (110px X 110px)',
                'meta-description'         => 'Meta Descrizione',
<<<<<<< HEAD
                'meta-keywords'            => 'Meta Parole Chiave',
                'meta-title'               => 'Meta Titolo',
                'position'                 => 'Posizione*',
=======
                'meta-keywords'            => 'Meta Keywords',
                'meta-title'               => 'Meta Titolo',
                'parent-category'          => 'Categoria Padre',
                'position'                 => 'Posizione',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'products-and-description' => 'Prodotti e Descrizione',
                'products-only'            => 'Solo Prodotti',
                'save-btn'                 => 'Salva Categoria',
                'slug'                     => 'Slug',
                'settings'                 => 'Impostazioni',
                'seo-details'              => 'Dettagli SEO',
<<<<<<< HEAD
                'select-parent-category'   => 'Seleziona Categoria Genitore*',
=======
                'select-display-mode'      => 'Seleziona Modalità di Visualizzazione',
                'title'                    => 'Aggiungi Nuova Categoria',
                'visible-in-menu'          => 'Visibile Nel Menu',
            ],

            'edit' => [
                'add-logo'                 => 'Aggiungi Logo',
                'add-banner'               => 'Aggiungi Banner',
                'banner'                   => 'Banner',
                'banner-size'              => 'Proporzione del banner (1320px X 300px)',
                'back-btn'                 => 'Indietro',
                'name'                     => 'Nome',
                'description'              => 'Descrizione',
                'description-and-images'   => 'Descrizione e Immagini',
                'description-only'         => 'Solo Descrizione',
                'display-mode'             => 'Modalità di Visualizzazione',
                'enter-position'           => 'Inserisci Posizione',
                'filterable-attributes'    => 'Attributi Filtrabili',
                'general'                  => 'Generale',
                'logo'                     => 'Logo',
                'logo-size'                => 'La risoluzione del logo dovrebbe essere (110px X 110px)',
                'meta-description'         => 'Meta Descrizione',
                'meta-keywords'            => 'Meta Keywords',
                'meta-title'               => 'Meta Titolo',
                'position'                 => 'Posizione',
                'products-and-description' => 'Prodotti e Descrizione',
                'products-only'            => 'Solo Prodotti',
                'save-btn'                 => 'Salva Categoria',
                'slug'                     => 'Slug',
                'settings'                 => 'Impostazioni',
                'seo-details'              => 'Dettagli SEO',
                'select-parent-category'   => 'Seleziona Categoria Padre',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'select-display-mode'      => 'Seleziona Modalità di Visualizzazione',
                'title'                    => 'Modifica Categoria',
                'visible-in-menu'          => 'Visibile Nel Menu',
            ],

            'create-success'       => 'Categoria creata con successo.',
            'category'             => 'Categoria',
            'update-success'       => 'Categoria aggiornata con successo.',
            'delete-success'       => 'La categoria è stata eliminata con successo.',
            'delete-category-root' => 'La categoria principale non può essere eliminata.',
<<<<<<< HEAD
            'delete-failed'        => 'Errore durante l\'eliminazione della categoria',
        ],

        'families'   => [
=======
            'delete-failed'        => 'Errore durante l\'eliminazione della categoria.',
        ],

        'families' => [
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            'index' => [
                'title' => 'Famiglie',
                'add'   => 'Crea Famiglia di Attributi',

                'datagrid' => [
                    'id'             => 'ID',
                    'code'           => 'Codice',
                    'name'           => 'Nome',
                    'edit'           => 'Modifica',
                    'delete'         => 'Elimina',
<<<<<<< HEAD
                    'delete-success' => ':resource selezionati sono stati eliminati con successo',
                    'partial-action' => 'Alcune azioni non sono state eseguite a causa di vincoli di sistema limitati su :resource',
                    'update-success' => ':resource selezionati sono stati aggiornati con successo',
                    'no-resource'    => 'La risorsa fornita è insufficiente per l\'azione',
                    'method-error'   => 'Errore! Metodo errato rilevato, controllare la configurazione dell\'azione di massa',
=======
                    'delete-success' => 'Le :resource selezionate sono state eliminate con successo',
                    'partial-action' => 'Alcune azioni non sono state eseguite a causa di vincoli di sistema restrittivi su :resource',
                    'update-success' => 'Le :resource selezionate sono state aggiornate con successo',
                    'no-resource'    => 'La risorsa fornita è insufficiente per l\'azione',
                    'method-error'   => 'Errore! Rilevato un metodo errato, controlla la configurazione dell\'azione di massa',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                ],
            ],

            'create' => [
                'title'                            => 'Crea Famiglia di Attributi',
                'save-btn'                         => 'Salva Famiglia di Attributi',
                'back-btn'                         => 'Indietro',
                'general'                          => 'Generale',
                'groups'                           => 'Gruppi',
<<<<<<< HEAD
                'groups-info'                      => 'Gestisci i gruppi di famiglia di attributi',
=======
                'groups-info'                      => 'Gestisci i gruppi della famiglia di attributi',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'delete-group-btn'                 => 'Elimina Gruppo',
                'add-group-btn'                    => 'Aggiungi Gruppo',
                'edit-group-info'                  => 'Doppio clic per modificare il Gruppo',
                'main-column'                      => 'Colonna Principale',
<<<<<<< HEAD
                'right-column'                     => 'Colonna Laterale Destra',
                'unassigned-attributes'            => 'Attributi non assegnati',
                'unassigned-attributes-info'       => 'Trascina questi attributi per aggiungerli alle colonne o ai gruppi.',
                'code'                             => 'Codice',
                'name'                             => 'Nome',
                'enter-code'                       => 'Inserisci il Codice',
                'enter-name'                       => 'Inserisci il Nome',
                'column'                           => 'Colonna',
                'add-group-title'                  => 'Aggiungi Nuovo Gruppo',
                'group-already-exists'             => 'Un nome di gruppo di attributi esiste già.',
                'select-group'                     => 'Seleziona un gruppo di attributi.',
                'group-contains-system-attributes' => 'Questo gruppo contiene attributi di sistema. Sposta prima gli attributi di sistema in un altro gruppo e riprova.',
                'removal-not-possible'             => 'Non puoi rimuovere gli attributi di sistema dalla famiglia di attributi.',
=======
                'right-column'                     => 'Colonna Lato Destro',
                'unassigned-attributes'            => 'Attributi Non Assegnati',
                'unassigned-attributes-info'       => 'Trascina questi attributi per aggiungerli alle colonne o ai gruppi.',
                'code'                             => 'Codice',
                'name'                             => 'Nome',
                'enter-code'                       => 'Inserisci Codice',
                'enter-name'                       => 'Inserisci Nome',
                'column'                           => 'Colonna',
                'add-group-title'                  => 'Aggiungi Nuovo Gruppo',
                'group-code-already-exists'        => 'Il codice del gruppo attributi esiste già.',
                'group-name-already-exists'        => 'Il nome del gruppo attributi esiste già.',
                'select-group'                     => 'Seleziona un gruppo di attributi.',
                'group-contains-system-attributes' => 'Questo gruppo contiene attributi di sistema. Sposta prima gli attributi di sistema in un altro gruppo e riprova.',
                'removal-not-possible'             => 'Non puoi rimuovere attributi di sistema dalla famiglia di attributi.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ],

            'edit' => [
                'title'                            => 'Modifica Famiglia di Attributi',
                'save-btn'                         => 'Salva Famiglia di Attributi',
                'back-btn'                         => 'Indietro',
                'groups'                           => 'Gruppi',
<<<<<<< HEAD
                'groups-info'                      => 'Gestisci i gruppi di famiglia di attributi',
=======
                'groups-info'                      => 'Gestisci i gruppi della famiglia di attributi',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'delete-group-btn'                 => 'Elimina Gruppo',
                'add-group-btn'                    => 'Aggiungi Gruppo',
                'edit-group-info'                  => 'Doppio clic per modificare il Gruppo',
                'main-column'                      => 'Colonna Principale',
<<<<<<< HEAD
                'right-column'                     => 'Colonna Laterale Destra',
                'unassigned-attributes'            => 'Attributi non assegnati',
=======
                'right-column'                     => 'Colonna Lato Destro',
                'unassigned-attributes'            => 'Attributi Non Assegnati',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'unassigned-attributes-info'       => 'Trascina questi attributi per aggiungerli alle colonne o ai gruppi.',
                'general'                          => 'Generale',
                'code'                             => 'Codice',
                'name'                             => 'Nome',
<<<<<<< HEAD
                'enter-code'                       => 'Inserisci il Codice',
                'enter-name'                       => 'Inserisci il Nome',
                'column'                           => 'Colonna',
                'add-group-title'                  => 'Aggiungi Nuovo Gruppo',
                'group-already-exists'             => 'Un nome di gruppo di attributi esiste già.',
                'select-group'                     => 'Seleziona un gruppo di attributi.',
                'group-contains-system-attributes' => 'Questo gruppo contiene attributi di sistema. Sposta prima gli attributi di sistema in un altro gruppo e riprova.',
                'removal-not-possible'             => 'Non puoi rimuovere gli attributi di sistema dalla famiglia di attributi.',
=======
                'enter-code'                       => 'Inserisci Codice',
                'enter-name'                       => 'Inserisci Nome',
                'column'                           => 'Colonna',
                'add-group-title'                  => 'Aggiungi Nuovo Gruppo',
                'group-code-already-exists'        => 'Il codice del gruppo attributi esiste già.',
                'group-name-already-exists'        => 'Il nome del gruppo attributi esiste già.',
                'select-group'                     => 'Seleziona un gruppo di attributi.',
                'group-contains-system-attributes' => 'Questo gruppo contiene attributi di sistema. Sposta prima gli attributi di sistema in un altro gruppo e riprova.',
                'removal-not-possible'             => 'Non puoi rimuovere attributi di sistema dalla famiglia di attributi.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ],

            'family'                  => 'Famiglia',
            'attribute-family'        => 'Famiglia di Attributi',
            'create-success'          => 'Famiglia creata con successo.',
            'update-success'          => 'Famiglia aggiornata con successo.',
            'delete-success'          => 'Famiglia eliminata con successo.',
<<<<<<< HEAD
            'delete-failed'           => 'Errore durante l\'eliminazione della Famiglia.',
            'user-define-error'       => 'Impossibile eliminare la famiglia di attributi di sistema',
            'last-delete-error'       => 'È richiesta almeno una famiglia.',
            'attribute-product-error' => 'la famiglia è utilizzata nei prodotti.',
=======
            'delete-failed'           => 'Errore durante l\'eliminazione della famiglia.',
            'user-define-error'       => 'Impossibile eliminare la famiglia di attributi di sistema',
            'last-delete-error'       => 'Almeno una famiglia è richiesta.',
            'attribute-product-error' => 'La famiglia è utilizzata nei prodotti.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ],
    ],

    'customers' => [
        'customers' => [
            'index' => [
                'login-message' => 'hai effettuato l\'accesso come :customer_name',
                'title'         => 'Clienti',

                'datagrid' => [
                    'id'             => 'ID Cliente',
                    'order'          => ':order Ordine(i)',
                    'address'        => ':address Indirizzo(i)',
                    'name'           => 'Nome Cliente',
                    'email'          => 'Email',
                    'group'          => 'Gruppo',
                    'phone'          => 'Numero di Contatto',
                    'gender'         => 'Genere',
                    'status'         => 'Stato',
                    'active'         => 'Attivo',
                    'inactive'       => 'Inattivo',
                    'suspended'      => 'Sospeso',
                    'revenue'        => 'Ricavo',
                    'address-count'  => 'Conteggio Indirizzi',
                    'order-count'    => 'Conteggio Ordini',
                    'update-status'  => 'Aggiorna Stato',
                    'delete'         => 'Elimina',
                    'delete-success' => 'Dati selezionati eliminati con successo',
                    'order-pending'  => 'Il cliente ha ordini in sospeso',
<<<<<<< HEAD
                    'partial-action' => 'Alcune azioni non sono state eseguite a causa di restrizioni di sistema su :resource',
                    'update-success' => 'Clienti selezionati aggiornati con successo',
                    'no-resource'    => 'La risorsa fornita non è sufficiente per l\'azione',
                    'method-error'   => 'Errore! Rilevato metodo errato, controllare la configurazione dell\'azione di massa',
=======
                    'partial-action' => 'Alcune azioni non sono state eseguite a causa di vincoli di sistema restrittivi su :resource',
                    'update-success' => 'Clienti selezionati aggiornati con successo',
                    'no-resource'    => 'La risorsa fornita non è sufficiente per l\'azione',
                    'method-error'   => 'Errore! Metodo errato rilevato, controllare la configurazione dell\'azione di massa',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                ],

                'create' => [
                    'create-btn'            => 'Crea Cliente',
                    'contact-number'        => 'Numero di Contatto',
                    'customer-group'        => 'Gruppo Cliente',
                    'create-success'        => 'Cliente creato con successo',
                    'date-of-birth'         => 'Data di Nascita',
                    'email'                 => 'Email',
<<<<<<< HEAD
                    'female'                => 'Femmina',
                    'first-name'            => 'Nome',
                    'gender'                => 'Genere',
                    'last-name'             => 'Cognome',
                    'male'                  => 'Maschio',
=======
                    'female'                => 'Femminile',
                    'first-name'            => 'Nome',
                    'gender'                => 'Genere',
                    'last-name'             => 'Cognome',
                    'male'                  => 'Maschile',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'other'                 => 'Altro',
                    'save-btn'              => 'Salva cliente',
                    'select-gender'         => 'Seleziona Genere',
                    'select-customer-group' => 'Seleziona Gruppo Cliente',
                    'title'                 => 'Crea Nuovo Cliente',
                ],
            ],

<<<<<<< HEAD
            'delete-success' => 'Cliente Eliminato con Successo',
            'delete-failed'  => 'Eliminazione Cliente Fallita',
            'update-success' => 'Cliente Aggiornato con Successo',
            'order-pending'  => 'Ordini in Sospeso',
=======
            'delete-success' => 'Cliente eliminato con successo',
            'delete-failed'  => 'Eliminazione cliente non riuscita',
            'update-success' => 'Cliente aggiornato con successo',
            'order-pending'  => 'Ordini in sospeso',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

            'edit' => [
                'contact-number'        => 'Numero di Contatto',
                'customer-group'        => 'Gruppo Cliente',
                'date-of-birth'         => 'Data di Nascita',
                'email'                 => 'Email',
                'edit-btn'              => 'Modifica',
<<<<<<< HEAD
                'female'                => 'Femmina',
                'first-name'            => 'Nome',
                'gender'                => 'Genere',
                'last-name'             => 'Cognome',
                'male'                  => 'Maschio',
=======
                'female'                => 'Femminile',
                'first-name'            => 'Nome',
                'gender'                => 'Genere',
                'last-name'             => 'Cognome',
                'male'                  => 'Maschile',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'other'                 => 'Altro',
                'select-customer-group' => 'Seleziona Gruppo Cliente',
                'select-gender'         => 'Seleziona Genere',
                'status'                => 'Stato',
                'save-btn'              => 'Salva cliente',
                'suspended'             => 'Sospeso',
                'title'                 => 'Modifica Cliente',
            ],

            'view' => [
                'address'                     => 'Indirizzo',
                'back-btn'                    => 'Indietro',
                'add-note'                    => 'Aggiungi Nota',
                'active'                      => 'Attivo',
<<<<<<< HEAD
                'address-delete-success'      => 'Indirizzo Eliminato con Successo',
                'customer'                    => 'Cliente',
                'customer-notified'           => ':date | Cliente <b>Avvisato</b>',
                'customer-not-notified'       => ':date | Cliente <b>Non Avvisato</b>',
=======
                'address-delete-success'      => 'Indirizzo eliminato con successo',
                'customer'                    => 'Cliente',
                'customer-notified'           => ':date | Cliente <b>Notificato</b>',
                'customer-not-notified'       => ':date | Cliente <b>Non Notificato</b>',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'delete-account'              => 'Elimina Account',
                'delete'                      => 'Elimina',
                'date-of-birth'               => 'Data di Nascita - :dob',
                'default-address'             => 'Indirizzo Predefinito',
                'empty-description'           => 'Crea Nuovi Indirizzi per il Cliente',
                'empty-title'                 => 'Aggiungi Indirizzo Cliente',
                'empty-order'                 => 'Nessun Ordine Disponibile',
                'empty-invoice'               => 'Nessuna Fattura Disponibile',
                'empty-review'                => 'Nessuna Recensione Disponibile',
                'edit'                        => 'Modifica',
                'email'                       => 'Email - :email',
                'gender'                      => 'Genere - :gender',
                'group'                       => 'Gruppo - :group_code',
                'inactive'                    => 'Inattivo',
                'id'                          => 'ID - :id',
                'increment-id'                => '# :increment_id',
                'invoice-id'                  => 'ID Fattura',
                'invoice-id-prefix'           => '# :invoice_id',
                'invoice-date'                => 'Data Fattura',
                'invoice-amount'              => 'Importo Fattura',
                'invoice'                     => 'Fatture (:invoice_count)',
                'mobile'                      => 'Cellulare',
                'notify-customer'             => 'Notifica Cliente',
                'note'                        => 'Nota',
<<<<<<< HEAD
                'note-created-success'        => 'Nota Creata con Successo',
                'orders'                      => 'Ordini (:order_count)',
                'order-id'                    => 'ID Ordine',
                'order-id-prefix'             => '# :order_id',
                'processing'                  => 'In Elaborazione',
                'pending'                     => 'In Attesa',
=======
                'note-created-success'        => 'Nota creata con successo',
                'orders'                      => 'Ordini (:order_count)',
                'order-id'                    => 'ID Ordine',
                'order-id-prefix'             => '# :order_id',
                'of'                          => 'di',
                'per-page'                    => 'per pagina',
                'processing'                  => 'In Elaborazione',
                'pending'                     => 'In Sospeso',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'completed'                   => 'Completato',
                'canceled'                    => 'Annullato',
                'closed'                      => 'Chiuso',
                'phone'                       => 'Telefono - :phone',
<<<<<<< HEAD
                'pay-by'                      => 'Pagato Con',
=======
                'pay-by'                      => 'Paga Con',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'reviews'                     => 'Recensioni',
                'approved'                    => 'Approvato',
                'disapproved'                 => 'Non Approvato',
                'suspended'                   => 'Sospeso',
                'set-default-success'         => 'Indirizzo Predefinito Aggiornato con Successo',
                'submit-btn-title'            => 'Invia Nota',
                'set-as-default'              => 'Imposta come Predefinito',
                'total-revenue'               => 'Ricavo Totale - :revenue',
<<<<<<< HEAD
                'title'                       => 'Vista Cliente',
                'note-placeholder'            => 'Scrivi qui la tua nota',
                'order-pending'               => 'Non è possibile eliminare l\'account perché ci sono Ordini in sospeso o in stato di elaborazione.',
=======
                'title'                       => 'Visualizza Cliente',
                'note-placeholder'            => 'Scrivi la tua nota qui',
                'order-pending'               => 'Impossibile eliminare l\'account perché ci sono Ordini in sospeso o in stato di elaborazione.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'account-delete-confirmation' => 'Sei sicuro di voler eliminare questo account?',
                'address-delete-confirmation' => 'Sei sicuro di voler eliminare questo indirizzo?',
            ],
        ],

        'groups' => [
            'index' => [
                'title' => 'Gruppi',

                'create' => [
                    'create-btn' => 'Crea Gruppo',
                    'code'       => 'Codice',
                    'success'    => 'Gruppo creato con successo',
                    'name'       => 'Nome',
                    'save-btn'   => 'Salva Gruppo',
                    'title'      => 'Crea nuovo Gruppo',
                ],

<<<<<<< HEAD
                'edit'  => [
                    'title'          => 'Modifica Gruppo',
                    'success'        => 'Gruppo Aggiornato con Successo',
                    'delete-success' => 'Gruppo Eliminato con Successo',
                    'delete-failed'  => 'Eliminazione Gruppo Fallita',
                    'group-default'  => 'Il Gruppo Predefinito non può essere Eliminato',
                ],

                'datagrid'  => [
                    'code'    => 'Codice',
                    'id'      => 'ID',
                    'name'    => 'Nome',
                    'edit'    => 'Modifica',
                    'delete'  => 'Elimina',
=======
                'edit' => [
                    'title'          => 'Modifica Gruppo',
                    'success'        => 'Gruppo aggiornato con successo',
                    'delete-success' => 'Gruppo eliminato con successo',
                    'delete-failed'  => 'Eliminazione Gruppo non riuscita',
                    'group-default'  => 'Il Gruppo Predefinito non può essere Eliminato',
                ],

                'datagrid' => [
                    'code'   => 'Codice',
                    'id'     => 'ID',
                    'name'   => 'Nome',
                    'edit'   => 'Modifica',
                    'delete' => 'Elimina',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                ],
            ],
        ],

        'reviews' => [
            'index' => [
                'description' => 'Descrizione',
                'date'        => 'Data',
                'id'          => 'ID',
                'name'        => 'Nome',
                'product'     => 'Prodotto',
                'rating'      => 'Valutazione',
                'status'      => 'Stato',
                'title'       => 'Recensioni',

<<<<<<< HEAD
                'edit'  => [
=======
                'edit' => [
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'title'          => 'Modifica Recensione',
                    'save-btn'       => 'Salva',
                    'customer'       => 'Cliente',
                    'product'        => 'Prodotto',
                    'id'             => 'ID',
                    'date'           => 'Data',
                    'status'         => 'Stato',
                    'approved'       => 'Approvato',
                    'disapproved'    => 'Non Approvato',
<<<<<<< HEAD
                    'pending'        => 'In Attesa',
=======
                    'pending'        => 'In Sospeso',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'rating'         => 'Valutazione',
                    'review-title'   => 'Titolo',
                    'review-comment' => 'Commento',
                    'images'         => 'Immagini',
<<<<<<< HEAD
                    'update-success' => 'Aggiornato con Successo',
                ],

                'datagrid'   => [
=======
                    'update-success' => 'Aggiornamento riuscito',
                ],

                'datagrid' => [
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'customer-names'      => 'Nome',
                    'comment'             => 'Commento',
                    'date'                => 'Data',
                    'id'                  => 'ID',
                    'product'             => 'Prodotto',
                    'rating'              => 'Valutazione',
                    'status'              => 'Stato',
                    'title'               => 'Titolo',
                    'edit'                => 'Modifica',
                    'delete'              => 'Elimina',
                    'update-status'       => 'Aggiorna Stato',
<<<<<<< HEAD
                    'pending'             => 'In Attesa',
                    'approved'            => 'Approvato',
                    'disapproved'         => 'Non Approvato',
                    'review-id'           => 'ID - :review_id',
                    'delete-success'      => 'Recensione Eliminata con Successo',
                    'mass-delete-success' => 'Recensioni Selezionate Eliminate con Successo',
                    'mass-delete-error'   => 'Si è verificato un errore',
                    'mass-update-success' => 'Recensioni Selezionate Aggiornate con Successo',
=======
                    'pending'             => 'In Sospeso',
                    'approved'            => 'Approvato',
                    'disapproved'         => 'Non Approvato',
                    'review-id'           => 'ID - :review_id',
                    'delete-success'      => 'Recensione eliminata con successo',
                    'mass-delete-success' => 'Recensioni selezionate eliminate con successo',
                    'mass-delete-error'   => 'Qualcosa è andato storto',
                    'mass-update-success' => 'Recensioni selezionate aggiornate con successo',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                ],
            ],
        ],

        'addresses' => [
            'create' => [
<<<<<<< HEAD
                'title'              => 'Crea Indirizzo del Cliente',
=======
                'title'              => 'Crea Indirizzo Cliente',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'create-address-btn' => 'Aggiungi Nuovo Indirizzo',
                'company-name'       => 'Nome Azienda',
                'vat-id'             => 'Partita IVA',
                'address-1'          => 'Indirizzo 1',
                'address-2'          => 'Indirizzo 2',
                'city'               => 'Città',
<<<<<<< HEAD
                'state'              => 'Stato',
=======
                'state'              => 'Provincia',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'select-country'     => 'Seleziona Paese',
                'country'            => 'Paese',
                'default-address'    => 'Indirizzo Predefinito',
                'first-name'         => 'Nome',
                'last-name'          => 'Cognome',
                'phone'              => 'Telefono',
                'street-address'     => 'Indirizzo',
<<<<<<< HEAD
                'post-code'          => 'Codice Postale',
=======
                'post-code'          => 'CAP',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'save-btn-title'     => 'Salva Indirizzo',
            ],

            'edit' => [
                'title'            => 'Modifica Indirizzo',
                'company-name'     => 'Nome Azienda',
                'vat-id'           => 'Partita IVA',
                'address-1'        => 'Indirizzo 1',
                'address-2'        => 'Indirizzo 2',
                'city'             => 'Città',
<<<<<<< HEAD
                'state'            => 'Stato',
=======
                'state'            => 'Provincia',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'select-country'   => 'Seleziona Paese',
                'country'          => 'Paese',
                'default-address'  => 'Indirizzo Predefinito',
                'first-name'       => 'Nome',
                'last-name'        => 'Cognome',
                'phone'            => 'Telefono',
                'street-address'   => 'Indirizzo',
<<<<<<< HEAD
                'post-code'        => 'Codice Postale',
                'save-btn-title'   => 'Salva Indirizzo',
            ],

            'create-success'       => 'Indirizzo creato con successo',
            'update-success'       => 'Indirizzo aggiornato con successo',
            'success-mass-delete'  => 'Eliminazione di Indirizzi in Massa Riuscita',
=======
                'post-code'        => 'CAP',
                'save-btn-title'   => 'Salva Indirizzo',
            ],

            'create-success'      => 'Indirizzo creato con successo',
            'update-success'      => 'Indirizzo aggiornato con successo',
            'success-mass-delete' => 'Eliminazione di massa dell\'indirizzo riuscita',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ],
    ],

    'marketing' => [
        'communications' => [
            'templates' => [
                'index' => [
<<<<<<< HEAD
                    'title'       => 'Modelli di Email',
                    'create-btn'  => 'Crea Modello',
=======
                    'title'      => 'Modelli di Email',
                    'create-btn' => 'Crea Modello',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

                    'datagrid' => [
                        'id'       => 'ID',
                        'name'     => 'Nome',
                        'status'   => 'Stato',
                        'active'   => 'Attivo',
                        'inactive' => 'Inattivo',
                        'draft'    => 'Bozza',
                    ],
                ],

                'create' => [
                    'title'          => 'Crea Modello',
                    'active'         => 'Attivo',
                    'content'        => 'Contenuto',
                    'back-btn'       => 'Indietro',
                    'draft'          => 'Bozza',
                    'general'        => 'Generale',
                    'inactive'       => 'Inattivo',
                    'name'           => 'Nome',
                    'save-btn'       => 'Salva Modello',
                    'status'         => 'Stato',
                    'select-status'  => 'Seleziona Stato',
<<<<<<< HEAD
                    'create-success' => 'Modello email creato con successo.',
=======
                    'create-success' => 'Modello di email creato con successo.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                ],

                'edit' => [
                    'title'          => 'Modifica Modello',
                    'active'         => 'Attivo',
<<<<<<< HEAD
                    'content'        => 'Contenuto*',
=======
                    'content'        => 'Contenuto',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'back-btn'       => 'Indietro',
                    'draft'          => 'Bozza',
                    'general'        => 'Generale',
                    'inactive'       => 'Inattivo',
                    'name'           => 'Nome',
                    'save-btn'       => 'Salva Modello',
                    'status'         => 'Stato',
                    'update-success' => 'Aggiornato con successo',
                ],

<<<<<<< HEAD
                'email-template'  => 'Modello Email',
                'delete-success'  => 'Modello Eliminato con successo',
                'delete-failed'   => ':name Eliminazione Fallita',
=======
                'email-template' => 'Modello di Email',
                'delete-success' => 'Modello eliminato con successo',
                'delete-failed'  => ':name Eliminazione non riuscita',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ],

            'campaigns' => [
                'index' => [
<<<<<<< HEAD
                    'title'       => 'Campagne',
                    'create-btn'  => 'Crea Campagna',
=======
                    'title'      => 'Campagne',
                    'create-btn' => 'Crea Campagna',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

                    'datagrid' => [
                        'id'       => 'ID',
                        'name'     => 'Nome',
                        'subject'  => 'Oggetto',
                        'status'   => 'Stato',
                        'active'   => 'Attivo',
                        'inactive' => 'Inattivo',
                        'edit'     => 'Modifica',
                        'delete'   => 'Elimina',
                    ],
                ],

                'create'    => [
                    'active'          => 'Attivo',
                    'back-btn'        => 'Indietro',
                    'customer-group'  => 'Gruppo Cliente',
                    'channel'         => 'Canale',
<<<<<<< HEAD
                    'email-template'  => 'Modello Email',
=======
                    'email-template'  => 'Modello di Email',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'event'           => 'Evento',
                    'general'         => 'Generale',
                    'inactive'        => 'Inattivo',
                    'name'            => 'Nome',
                    'save-btn'        => 'Salva Campagna',
                    'setting'         => 'Impostazione',
                    'status'          => 'Stato',
                    'select-template' => 'Seleziona Modello',
                    'select-event'    => 'Seleziona Evento',
                    'select-status'   => 'Seleziona Stato',
<<<<<<< HEAD
                    'select-channel'  => 'Seleziona canale',
                    'select-group'    => 'Seleziona gruppo',
=======
                    'select-channel'  => 'Seleziona Canale',
                    'select-group'    => 'Seleziona Gruppo',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'subject'         => 'Oggetto',
                    'title'           => 'Crea Campagna',
                ],

                'edit'    => [
                    'active'          => 'Attivo',
                    'audience'        => 'Pubblico',
                    'back-btn'        => 'Indietro',
                    'customer-group'  => 'Gruppo Cliente',
                    'channel'         => 'Canale',
<<<<<<< HEAD
                    'email-template'  => 'Modello Email',
=======
                    'email-template'  => 'Modello di Email',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'event'           => 'Evento',
                    'general'         => 'Generale',
                    'inactive'        => 'Inattivo',
                    'name'            => 'Nome',
                    'save-btn'        => 'Salva Campagna',
                    'status'          => 'Stato',
                    'select-template' => 'Seleziona Modello',
                    'select-event'    => 'Seleziona Evento',
                    'select-status'   => 'Seleziona Stato',
                    'subject'         => 'Oggetto',
                    'title'           => 'Modifica Campagna',
                ],

                'email-campaign' => 'Campagna Email',
                'create-success' => 'Campagna creata con successo.',
                'update-success' => 'Campagna aggiornata con successo.',
                'delete-success' => 'Campagna eliminata con successo',
<<<<<<< HEAD
                'delete-failed'  => ':name Eliminazione Fallita',
=======
                'delete-failed'  => ':name Eliminazione non riuscita',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ],

            'events' => [
                'index'  => [
<<<<<<< HEAD
                    'create-btn'  => 'Crea Evento',
                    'title'       => 'Eventi',
                    'event'       => 'Evento',
=======
                    'create-btn' => 'Crea Evento',
                    'title'      => 'Eventi',
                    'event'      => 'Evento',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

                    'datagrid' => [
                        'id'      => 'ID',
                        'name'    => 'Nome',
                        'date'    => 'Data',
                        'edit'    => 'Modifica',
                        'delete'  => 'Elimina',
                        'actions' => 'Azioni',
                    ],

                    'create'   => [
                        'description'    => 'Descrizione',
                        'date'           => 'Data',
                        'delete-warning' => 'Sei sicuro di voler eseguire questa azione?',
                        'general'        => 'Generale',
                        'name'           => 'Nome',
                        'save-btn'       => 'Salva Evento',
                        'title'          => 'Crea Eventi',
                        'success'        => 'Eventi Creati con Successo',
                    ],

                    'edit'  => [
                        'title'   => 'Modifica Eventi',
                        'success' => 'Eventi Aggiornati con Successo',
                    ],
                ],

<<<<<<< HEAD
                'edit-error'     => 'Non è possibile modificare l\'evento',
                'delete-failed'  => ':name Eliminazione Fallita',
=======
                'edit-error'     => 'L\'evento non può essere modificato',
                'delete-failed'  => ':name Eliminazione non riuscita',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'delete-success' => 'Eventi Eliminati con Successo',
            ],

            'subscribers' => [
                'index' => [
                    'title' => 'Iscrizioni alla Newsletter',

                    'datagrid' => [
<<<<<<< HEAD
                        'id'          => 'ID',
                        'subscribed'  => 'Iscritto',
                        'true'        => 'Sì',
                        'false'       => 'No',
                        'edit'        => 'Modifica',
                        'delete'      => 'Elimina',
                        'email'       => 'Email',
                        'actions'     => 'Azioni',
=======
                        'id'         => 'ID',
                        'subscribed' => 'Iscritto',
                        'true'       => 'Vero',
                        'false'      => 'Falso',
                        'edit'       => 'Modifica',
                        'delete'     => 'Elimina',
                        'email'      => 'Email',
                        'actions'    => 'Azioni',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    ],

                    'edit'  => [
                        'title'         => 'Modifica Iscritto alla Newsletter',
                        'back-btn'      => 'Indietro',
                        'save-btn'      => 'Salva Iscritto',
                        'email'         => 'Email',
                        'subscribed'    => 'Iscritto',
<<<<<<< HEAD
                        'true'          => 'Sì',
                        'false'         => 'No',
                        'success'       => 'Iscrizione alla Newsletter Aggiornata con Successo',
                        'update-failed' => 'Iscrizione alla Newsletter Non Aggiornata',
                    ],
                ],

                'delete-warning'  => 'Sei sicuro di voler eseguire questa azione?',
                'delete-success'  => 'Iscritto Eliminato con Successo',
                'delete-failed'   => 'Eliminazione Iscritto Fallita',
=======
                        'true'          => 'Vero',
                        'false'         => 'Falso',
                        'success'       => 'Iscrizione alla newsletter aggiornata con successo',
                        'update-failed' => 'Iscrizione alla newsletter non aggiornata',
                    ],
                ],

                'delete-warning' => 'Sei sicuro di voler eseguire questa azione?',
                'delete-success' => 'Iscritto Eliminato con Successo',
                'delete-failed'  => 'Eliminazione Iscritto non riuscita',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ],
        ],

        'promotions' => [
            'index' => [
                'catalog-rule-title' => 'Regole del Catalogo',
                'cart-rule-title'    => 'Regole del Carrello',
            ],

            'cart-rules' => [
                'index' => [
                    'title'      => 'Regole del Carrello',
                    'create-btn' => 'Crea Regola del Carrello',

                    'datagrid' => [
                        'id'          => 'ID',
                        'name'        => 'Nome',
                        'coupon-code' => 'Codice Coupon',
                        'copy-of'     => ':value',
                        'copy'        => 'Copia',
                        'start'       => 'Inizio',
                        'end'         => 'Fine',
                        'status'      => 'Stato',
                        'active'      => 'Attivo',
                        'inactive'    => 'Inattivo',
                        'draft'       => 'Bozza',
                        'priority'    => 'Priorità',
                        'edit'        => 'Modifica',
                        'delete'      => 'Elimina',
                    ],
                ],

                'create' => [
                    'back-btn'                                  => 'Indietro',
                    'title'                                     => 'Crea Regola del Carrello',
                    'save-btn'                                  => 'Salva Regola del Carrello',
                    'general'                                   => 'Generale',
                    'name'                                      => 'Nome',
                    'description'                               => 'Descrizione',
                    'customer-groups'                           => 'Gruppi di Clienti',
                    'channels'                                  => 'Canali',
                    'coupon-type'                               => 'Tipo di Coupon',
                    'no-coupon'                                 => 'Nessun Coupon',
                    'specific-coupon'                           => 'Coupon Specifico',
<<<<<<< HEAD
                    'auto-generate-coupon'                      => 'Generazione Automatica Coupon',
=======
                    'auto-generate-coupon'                      => 'Genera Coupon Automaticamente',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'no'                                        => 'No',
                    'yes'                                       => 'Sì',
                    'coupon-code'                               => 'Codice Coupon',
                    'uses-per-coupon'                           => 'Usi per Coupon',
                    'uses-per-customer'                         => 'Usi per Cliente',
<<<<<<< HEAD
                    'uses-per-customer-control-info'            => 'Sarà utilizzato solo per i clienti registrati.',
                    'conditions'                                => 'Condizioni',
                    'condition-type'                            => 'Tipo di Condizione',
                    'all-conditions-true'                       => 'Tutte le Condizioni sono Vere',
                    'any-conditions-true'                       => 'Qualsiasi Condizione è Vera',
=======
                    'uses-per-customer-control-info'            => 'Sarà utilizzato solo per i clienti autenticati.',
                    'conditions'                                => 'Condizioni',
                    'condition-type'                            => 'Tipo di Condizione',
                    'all-conditions-true'                       => 'Tutte le Condizioni sono Vere',
                    'any-conditions-true'                       => 'Almeno una Condizione è Vera',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'add-condition'                             => 'Aggiungi Condizione',
                    'actions'                                   => 'Azioni',
                    'action-type'                               => 'Tipo di Azione',
                    'percentage-product-price'                  => 'Percentuale del Prezzo del Prodotto',
                    'fixed-amount'                              => 'Importo Fisso',
                    'fixed-amount-whole-cart'                   => 'Importo Fisso per l\'intero Carrello',
<<<<<<< HEAD
                    'buy-x-get-y-free'                          => 'Acquista X e Ottieni Y Gratis',
                    'discount-amount'                           => 'Importo dello Sconto',
                    'maximum-quantity-allowed-to-be-discounted' => 'Quantità massima consentita per lo sconto',
                    'buy-x-quantity'                            => 'Acquista Quantità X',
                    'apply-to-shipping'                         => 'Applica alla Spedizione',
                    'free-shipping'                             => 'Spedizione Gratuita',
                    'end-of-other-rules'                        => 'Fine di altre regole',
=======
                    'buy-x-get-y-free'                          => 'Compra X Ottieni Y Gratis',
                    'discount-amount'                           => 'Importo Sconto',
                    'maximum-quantity-allowed-to-be-discounted' => 'Quantità massima consentita per lo sconto',
                    'buy-x-quantity'                            => 'Compra Quantità X',
                    'apply-to-shipping'                         => 'Applica alla Spedizione',
                    'free-shipping'                             => 'Spedizione Gratuita',
                    'end-of-other-rules'                        => 'Fine di Altre Regole',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'settings'                                  => 'Impostazioni',
                    'status'                                    => 'Stato',
                    'priority'                                  => 'Priorità',
                    'marketing-time'                            => 'Tempo di Marketing',
                    'from'                                      => 'Da',
                    'to'                                        => 'A',
                    'is-equal-to'                               => 'È uguale a',
                    'is-not-equal-to'                           => 'Non è uguale a',
                    'equals-or-greater-than'                    => 'Uguale o maggiore di',
                    'equals-or-less-than'                       => 'Uguale o minore di',
                    'greater-than'                              => 'Maggiore di',
                    'less-than'                                 => 'Minore di',
                    'contain'                                   => 'Contiene',
                    'contains'                                  => 'Contiene',
<<<<<<< HEAD
                    'does-not-contain'                          => 'Non contiene',
                    'cart-attribute'                            => 'Attributo del Carrello',
                    'subtotal'                                  => 'Subtotale',
                    'payment-method'                            => 'Metodo di Pagamento',
                    'total-items-qty'                           => 'Quantità Totale degli Articoli',
                    'shipping-method'                           => 'Metodo di Spedizione',
                    'shipping-postcode'                         => 'CAP di Spedizione',
=======
                    'does-not-contain'                          => 'Non Contiene',
                    'cart-attribute'                            => 'Attributo del Carrello',
                    'subtotal'                                  => 'Subtotale',
                    'payment-method'                            => 'Metodo di Pagamento',
                    'total-items-qty'                           => 'Quantità Totale Articoli',
                    'shipping-method'                           => 'Metodo di Spedizione',
                    'shipping-postcode'                         => 'Codice Postale di Spedizione',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'shipping-state'                            => 'Stato di Spedizione',
                    'shipping-country'                          => 'Paese di Spedizione',
                    'cart-item-attribute'                       => 'Attributo dell\'Articolo nel Carrello',
                    'price-in-cart'                             => 'Prezzo nel Carrello',
                    'qty-in-cart'                               => 'Quantità nel Carrello',
                    'total-weight'                              => 'Peso Totale',
                    'additional'                                => 'Aggiuntivo',
                    'product-attribute'                         => 'Attributo del Prodotto',
                    'categories'                                => 'Categorie',
                    'children-categories'                       => 'Categorie Figlie',
<<<<<<< HEAD
                    'parent-categories'                         => 'Categorie Genitori',
                    'attribute-family'                          => 'Famiglia di Attributi',
                    'attribute-name-children-only'              => 'Nome Attributo Solo Figli',
                    'attribute-name-parent-only'                => 'Nome Attributo Solo Genitori',
                    'create-success'                            => 'Regola del Carrello creata con successo',
=======
                    'parent-categories'                         => 'Categorie Genitore',
                    'attribute-family'                          => 'Famiglia di Attributi',
                    'attribute-name-children-only'              => 'Nome dell\'Attributo Solo Figli',
                    'attribute-name-parent-only'                => 'Nome dell\'Attributo Solo Genitori',
                    'create-success'                            => 'Regola del carrello creata con successo',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'choose-condition-to-add'                   => 'Scegli la condizione da aggiungere',
                ],

                'edit' => [
                    'back-btn'                                  => 'Indietro',
                    'title'                                     => 'Modifica Regola del Carrello',
                    'save-btn'                                  => 'Salva Regola del Carrello',
                    'general'                                   => 'Generale',
                    'name'                                      => 'Nome',
                    'description'                               => 'Descrizione',
                    'customer-groups'                           => 'Gruppi di Clienti',
                    'channels'                                  => 'Canali',
                    'coupon-type'                               => 'Tipo di Coupon',
                    'no-coupon'                                 => 'Nessun Coupon',
                    'specific-coupon'                           => 'Coupon Specifico',
<<<<<<< HEAD
                    'auto-generate-coupon'                      => 'Generazione Automatica Coupon',
=======
                    'auto-generate-coupon'                      => 'Genera Coupon Automaticamente',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'no'                                        => 'No',
                    'yes'                                       => 'Sì',
                    'coupon-code'                               => 'Codice Coupon',
                    'uses-per-coupon'                           => 'Usi per Coupon',
                    'uses-per-customer'                         => 'Usi per Cliente',
<<<<<<< HEAD
                    'uses-per-customer-control-info'            => 'Sarà utilizzato solo per i clienti registrati.',
                    'conditions'                                => 'Condizioni',
                    'condition-type'                            => 'Tipo di Condizione',
                    'all-conditions-true'                       => 'Tutte le Condizioni sono Vere',
                    'any-conditions-true'                       => 'Qualsiasi Condizione è Vera',
=======
                    'uses-per-customer-control-info'            => 'Sarà utilizzato solo per i clienti autenticati.',
                    'conditions'                                => 'Condizioni',
                    'condition-type'                            => 'Tipo di Condizione',
                    'all-conditions-true'                       => 'Tutte le Condizioni sono Vere',
                    'any-conditions-true'                       => 'Almeno una Condizione è Vera',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'add-condition'                             => 'Aggiungi Condizione',
                    'actions'                                   => 'Azioni',
                    'action-type'                               => 'Tipo di Azione',
                    'percentage-product-price'                  => 'Percentuale del Prezzo del Prodotto',
                    'fixed-amount'                              => 'Importo Fisso',
                    'fixed-amount-whole-cart'                   => 'Importo Fisso per l\'intero Carrello',
<<<<<<< HEAD
                    'buy-x-get-y-free'                          => 'Acquista X e Ottieni Y Gratis',
                    'discount-amount'                           => 'Importo dello Sconto',
                    'maximum-quantity-allowed-to-be-discounted' => 'Quantità massima consentita per lo sconto',
                    'buy-x-quantity'                            => 'Acquista Quantità X',
                    'apply-to-shipping'                         => 'Applica alla Spedizione',
                    'free-shipping'                             => 'Spedizione Gratuita',
                    'end-of-other-rules'                        => 'Fine di altre regole',
=======
                    'buy-x-get-y-free'                          => 'Compra X Ottieni Y Gratis',
                    'discount-amount'                           => 'Importo Sconto',
                    'maximum-quantity-allowed-to-be-discounted' => 'Quantità massima consentita per lo sconto',
                    'buy-x-quantity'                            => 'Compra Quantità X',
                    'apply-to-shipping'                         => 'Applica alla Spedizione',
                    'free-shipping'                             => 'Spedizione Gratuita',
                    'end-of-other-rules'                        => 'Fine di Altre Regole',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'settings'                                  => 'Impostazioni',
                    'status'                                    => 'Stato',
                    'priority'                                  => 'Priorità',
                    'marketing-time'                            => 'Tempo di Marketing',
                    'from'                                      => 'Da',
                    'to'                                        => 'A',
                    'is-equal-to'                               => 'È uguale a',
                    'is-not-equal-to'                           => 'Non è uguale a',
                    'equals-or-greater-than'                    => 'Uguale o maggiore di',
                    'equals-or-less-than'                       => 'Uguale o minore di',
                    'greater-than'                              => 'Maggiore di',
                    'less-than'                                 => 'Minore di',
                    'contain'                                   => 'Contiene',
                    'contains'                                  => 'Contiene',
<<<<<<< HEAD
                    'does-not-contain'                          => 'Non contiene',
                    'cart-attribute'                            => 'Attributo del Carrello',
                    'subtotal'                                  => 'Subtotale',
                    'payment-method'                            => 'Metodo di Pagamento',
                    'total-items-qty'                           => 'Quantità Totale degli Articoli',
                    'shipping-method'                           => 'Metodo di Spedizione',
                    'shipping-postcode'                         => 'CAP di Spedizione',
=======
                    'does-not-contain'                          => 'Non Contiene',
                    'cart-attribute'                            => 'Attributo del Carrello',
                    'subtotal'                                  => 'Subtotale',
                    'payment-method'                            => 'Metodo di Pagamento',
                    'total-items-qty'                           => 'Quantità Totale Articoli',
                    'shipping-method'                           => 'Metodo di Spedizione',
                    'shipping-postcode'                         => 'Codice Postale di Spedizione',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'shipping-state'                            => 'Stato di Spedizione',
                    'shipping-country'                          => 'Paese di Spedizione',
                    'cart-item-attribute'                       => 'Attributo dell\'Articolo nel Carrello',
                    'price-in-cart'                             => 'Prezzo nel Carrello',
                    'qty-in-cart'                               => 'Quantità nel Carrello',
                    'total-weight'                              => 'Peso Totale',
                    'additional'                                => 'Aggiuntivo',
                    'product-attribute'                         => 'Attributo del Prodotto',
                    'categories'                                => 'Categorie',
                    'children-categories'                       => 'Categorie Figlie',
<<<<<<< HEAD
                    'parent-categories'                         => 'Categorie Genitori',
                    'attribute-family'                          => 'Famiglia di Attributi',
                    'attribute-name-children-only'              => 'Nome Attributo Solo Figli',
                    'attribute-name-parent-only'                => 'Nome Attributo Solo Genitori',
                    'update-success'                            => 'Regola del Carrello aggiornata con successo',
                    'choose-condition-to-add'                   => 'Scegli la condizione da aggiungere',
                    'coupon-qty'                                => 'Quantità Coupon',
                    'coupon-length'                             => 'Lunghezza Coupon',
                    'code-format'                               => 'Formato del Codice',
                    'alphanumeric'                              => 'Alfanumerico',
                    'alphabetical'                              => 'Alfabetico',
                    'numeric'                                   => 'Numerico',
                    'code-suffix'                               => 'Suffisso del Codice',
                    'code-prefix'                               => 'Prefisso del Codice',
=======
                    'parent-categories'                         => 'Categorie Genitore',
                    'attribute-family'                          => 'Famiglia di Attributi',
                    'attribute-name-children-only'              => 'Nome dell\'Attributo Solo Figli',
                    'attribute-name-parent-only'                => 'Nome dell\'Attributo Solo Genitori',
                    'update-success'                            => 'Regola del carrello aggiornata con successo',
                    'choose-condition-to-add'                   => 'Scegli la condizione da aggiungere',
                    'coupon-qty'                                => 'Quantità Coupon',
                    'coupon-length'                             => 'Lunghezza Coupon',
                    'code-format'                               => 'Formato Codice',
                    'alphanumeric'                              => 'Alfanumerico',
                    'alphabetical'                              => 'Alfabetico',
                    'numeric'                                   => 'Numerico',
                    'code-suffix'                               => 'Suffisso Codice',
                    'code-prefix'                               => 'Prefisso Codice',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'generate'                                  => 'Genera',
                    'customer-group'                            => 'Gruppo di Clienti',
                ],

<<<<<<< HEAD
                'delete-success' => 'Regola del Carrello eliminata con successo',
                'delete-failed'  => 'Eliminazione Regola del Carrello fallita',
=======
                'delete-success' => 'Regola del Carrello Eliminata con Successo',
                'delete-failed'  => 'Eliminazione Regola del Carrello Fallita',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ],

            'catalog-rules' => [
                'index' => [
                    'title'      => 'Regole del Catalogo',
                    'create-btn' => 'Crea Regola del Catalogo',

                    'datagrid' => [
<<<<<<< HEAD
                        'id'        => 'ID',
                        'name'      => 'Nome',
                        'start'     => 'Inizio',
                        'end'       => 'Fine',
                        'status'    => 'Stato',
                        'active'    => 'Attivo',
                        'inactive'  => 'Inattivo',
                        'priority'  => 'Priorità',
                        'edit'      => 'Modifica',
                        'delete'    => 'Elimina',
=======
                        'id'       => 'ID',
                        'name'     => 'Nome',
                        'start'    => 'Inizio',
                        'end'      => 'Fine',
                        'status'   => 'Stato',
                        'active'   => 'Attivo',
                        'inactive' => 'Inattivo',
                        'priority' => 'Priorità',
                        'edit'     => 'Modifica',
                        'delete'   => 'Elimina',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    ],
                ],

                'create' => [
                    'back-btn'                 => 'Indietro',
                    'title'                    => 'Crea Regola del Catalogo',
                    'save-btn'                 => 'Salva Regola del Catalogo',
                    'general'                  => 'Generale',
                    'name'                     => 'Nome',
                    'description'              => 'Descrizione',
                    'channels'                 => 'Canali',
<<<<<<< HEAD
                    'customer-groups'          => 'Gruppi Clienti',
=======
                    'customer-groups'          => 'Gruppi di Clienti',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'conditions'               => 'Condizioni',
                    'condition-type'           => 'Tipo di Condizione',
                    'all-conditions-true'      => 'Tutte le condizioni sono vere',
                    'any-conditions-true'      => 'Almeno una condizione è vera',
                    'add-condition'            => 'Aggiungi Condizione',
                    'actions'                  => 'Azioni',
<<<<<<< HEAD
                    'percentage-product-price' => 'Percentuale sul Prezzo del Prodotto',
                    'fixed-amount'             => 'Importo Fisso',
                    'discount-amount'          => 'Importo Sconto',
                    'end-other-rules'          => 'Termina le altre regole',
=======
                    'percentage-product-price' => 'Percentuale del Prezzo del Prodotto',
                    'fixed-amount'             => 'Importo Fisso',
                    'discount-amount'          => 'Importo Sconto',
                    'end-other-rules'          => 'Termina altre regole',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'yes'                      => 'Sì',
                    'no'                       => 'No',
                    'settings'                 => 'Impostazioni',
                    'status'                   => 'Stato',
                    'priority'                 => 'Priorità',
                    'marketing-time'           => 'Tempo di Marketing',
                    'from'                     => 'Da',
                    'to'                       => 'A',
                    'choose-condition-to-add'  => 'Scegli Condizione da Aggiungere',
                    'is-equal-to'              => 'È uguale a',
                    'is-not-equal-to'          => 'Non è uguale a',
                    'equals-or-greater-than'   => 'Uguale o maggiore di',
                    'equals-or-less-than'      => 'Uguale o minore di',
                    'greater-than'             => 'Maggiore di',
                    'less-than'                => 'Minore di',
                    'contain'                  => 'Contiene',
                    'contains'                 => 'Contiene',
                    'does-not-contain'         => 'Non contiene',
                    'categories'               => 'Categorie',
                    'attribute-family'         => 'Famiglia di Attributi',
                    'product-attribute'        => 'Attributo del Prodotto',
                    'action-type'              => 'Tipo di Azione',
                ],

                'edit' => [
                    'back-btn'                 => 'Indietro',
                    'title'                    => 'Modifica Regola del Catalogo',
                    'save-btn'                 => 'Salva Regola del Catalogo',
                    'general'                  => 'Generale',
                    'name'                     => 'Nome',
                    'description'              => 'Descrizione',
                    'channels'                 => 'Canali',
<<<<<<< HEAD
                    'customer-groups'          => 'Gruppi Clienti',
=======
                    'customer-groups'          => 'Gruppi di Clienti',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'conditions'               => 'Condizioni',
                    'condition-type'           => 'Tipo di Condizione',
                    'all-conditions-true'      => 'Tutte le condizioni sono vere',
                    'any-conditions-true'      => 'Almeno una condizione è vera',
                    'add-condition'            => 'Aggiungi Condizione',
                    'actions'                  => 'Azioni',
<<<<<<< HEAD
                    'percentage-product-price' => 'Percentuale sul Prezzo del Prodotto',
                    'fixed-amount'             => 'Importo Fisso',
                    'discount-amount'          => 'Importo Sconto',
                    'end-other-rules'          => 'Termina le altre regole',
=======
                    'percentage-product-price' => 'Percentuale del Prezzo del Prodotto',
                    'fixed-amount'             => 'Importo Fisso',
                    'discount-amount'          => 'Importo Sconto',
                    'end-other-rules'          => 'Termina altre regole',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'yes'                      => 'Sì',
                    'no'                       => 'No',
                    'settings'                 => 'Impostazioni',
                    'status'                   => 'Stato',
                    'priority'                 => 'Priorità',
                    'marketing-time'           => 'Tempo di Marketing',
                    'from'                     => 'Da',
                    'to'                       => 'A',
                    'choose-condition-to-add'  => 'Scegli Condizione da Aggiungere',
                    'is-equal-to'              => 'È uguale a',
                    'is-not-equal-to'          => 'Non è uguale a',
                    'equals-or-greater-than'   => 'Uguale o maggiore di',
                    'equals-or-less-than'      => 'Uguale o minore di',
                    'greater-than'             => 'Maggiore di',
                    'less-than'                => 'Minore di',
                    'contain'                  => 'Contiene',
                    'contains'                 => 'Contiene',
                    'does-not-contain'         => 'Non contiene',
                    'categories'               => 'Categorie',
                    'product-attribute'        => 'Attributo del Prodotto',
                    'action-type'              => 'Tipo di Azione',
                ],

                'create-success' => 'Regola del catalogo creata con successo',
                'delete-success' => 'Regola del catalogo eliminata con successo',
                'update-success' => 'Regola del catalogo aggiornata con successo',
            ],

            'cart-rules-coupons' => [
<<<<<<< HEAD
                'cart-rule-not-defined-error' => 'La regola del carrello non può essere eliminata',
                'delete-success'              => 'Coupon della regola del carrello eliminato con successo',
                'mass-delete-success'         => 'Elementi selezionati eliminati con successo',
                'success'                     => ':name creato con successo',

                'datagrid' => [
                    'coupon-code'     => 'Codice coupon',
                    'created-date'    => 'Data di creazione',
                    'delete'          => 'Elimina',
                    'expiration-date' => 'Data di scadenza',
                    'id'              => 'ID',
                    'times-used'      => 'Volte utilizzato',
=======
                'cart-rule-not-defined-error' => 'Impossibile eliminare la regola del carrello',
                'delete-success'              => 'Coupon della Regola del Carrello Eliminato con Successo',
                'mass-delete-success'         => 'Elementi Selezionati Eliminati con Successo',
                'success'                     => ':name Creato con Successo',

                'datagrid' => [
                    'coupon-code'     => 'Codice Coupon',
                    'created-date'    => 'Data di Creazione',
                    'expiration-date' => 'Data di Scadenza',
                    'delete'          => 'Elimina',
                    'id'              => 'ID',
                    'times-used'      => 'Volte Usato',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                ],
            ],
        ],

<<<<<<< HEAD
        'sitemaps' => [
            'index' => [
                'title'       => 'Mappa del sito',
                'create-btn'  => 'Crea mappa del sito',
                'sitemap'     => 'Mappa del sito',

                'datagrid' => [
                    'id'              => 'ID',
                    'file-name'       => 'Nome file',
                    'path'            => 'Percorso',
                    'link-for-google' => 'Link per Google',
                    'edit'            => 'Modifica',
                    'delete'          => 'Elimina',
                    'actions'         => 'Azioni',
                ],

                'create'  => [
                    'file-name'      => 'Nome file',
                    'file-name-info' => 'Esempio: sitemap.xml',
                    'path'           => 'Percorso',
                    'path-info'      => 'Esempio: "/sitemap/" o "/" per il percorso di base',
                    'save-btn'       => 'Salva mappa del sito',
                    'title'          => 'Crea mappa del sito',
                    'success'        => 'Mappa del sito creata con successo',
                    'delete-warning' => 'Sei sicuro di voler eseguire questa azione?',
                ],

                'edit'  => [
                    'title'          => 'Modifica mappa del sito',
                    'success'        => 'Mappa del sito aggiornata con successo',
                    'delete-success' => 'Mappa del sito eliminata con successo',
                ],
            ],

            'edit'  => [
                'back-btn'       => 'Indietro',
                'file-name'      => 'Nome file',
                'file-name-info' => 'Esempio: sitemap.xml',
                'general'        => 'Generale',
                'path'           => 'Percorso',
                'path-info'      => 'Esempio: "/sitemap/" o "/" per il percorso di base',
                'save-btn'       => 'Salva mappa del sito',
            ],

            'delete-failed'  => ':name Eliminata con errore',
=======
        'search-seo' => [
            'search-terms' => [
                'index' => [
                    'title'      => 'Termini di Ricerca',
                    'create-btn' => 'Crea Termine di Ricerca',

                    'datagrid' => [
                        'id'                  => 'ID',
                        'search-query'        => 'Query di Ricerca',
                        'Channel'             => 'Canale',
                        'results'             => 'Risultati',
                        'uses'                => 'Usi',
                        'redirect-url'        => 'URL di Reindirizzamento',
                        'channel'             => 'Canale',
                        'locale'              => 'Località',
                        'edit'                => 'Modifica',
                        'delete'              => 'Elimina',
                        'actions'             => 'Azioni',
                        'mass-delete-success' => 'Termini di Ricerca Selezionati Eliminati con Successo',
                    ],

                    'create' => [
                        'search-query'   => 'Query di Ricerca',
                        'Channel'        => 'Canale',
                        'results'        => 'Risultati',
                        'uses'           => 'Usi',
                        'redirect-url'   => 'URL di Reindirizzamento',
                        'channel'        => 'Canale',
                        'locale'         => 'Località',
                        'save-btn'       => 'Salva Termine di Ricerca',
                        'title'          => 'Crea Termine di Ricerca',
                        'success'        => 'Termine di Ricerca creato con successo',
                        'delete-warning' => 'Sei sicuro di voler eseguire questa azione?',
                    ],

                    'edit' => [
                        'title'          => 'Modifica Termine di Ricerca',
                        'success'        => 'Termine di Ricerca aggiornato con successo',
                        'delete-success' => 'Termine di Ricerca eliminato con successo',
                    ],
                ],
            ],

            'search-synonyms' => [
                'index' => [
                    'title'      => 'Sinonimi di Ricerca',
                    'create-btn' => 'Crea Sinonimo di Ricerca',

                    'datagrid' => [
                        'id'                  => 'ID',
                        'name'                => 'Nome',
                        'terms'               => 'Termini',
                        'edit'                => 'Modifica',
                        'delete'              => 'Elimina',
                        'actions'             => 'Azioni',
                        'mass-delete-success' => 'Sinonimi di Ricerca Selezionati Eliminati con Successo',
                    ],

                    'create' => [
                        'name'           => 'Nome',
                        'terms'          => 'Termini',
                        'terms-info'     => 'Inserisci i sinonimi come lista separata da virgole, ad esempio, "scarpe,calzature." Questo espande la ricerca includendo entrambi i termini.',
                        'save-btn'       => 'Salva Sinonimo di Ricerca',
                        'title'          => 'Crea Sinonimo di Ricerca',
                        'success'        => 'Sinonimo di Ricerca creato con successo',
                        'delete-warning' => 'Sei sicuro di voler eseguire questa azione?',
                    ],

                    'edit' => [
                        'title'          => 'Modifica Sinonimo di Ricerca',
                        'success'        => 'Sinonimo di Ricerca aggiornato con successo',
                        'delete-success' => 'Sinonimo di Ricerca eliminato con successo',
                    ],
                ],
            ],

            'sitemaps' => [
                'index' => [
                    'title'      => 'Mappe del Sito',
                    'create-btn' => 'Crea Mappa del Sito',
                    'sitemap'    => 'Mappa del Sito',

                    'datagrid' => [
                        'id'              => 'ID',
                        'file-name'       => 'Nome File',
                        'path'            => 'Percorso',
                        'link-for-google' => 'Link per Google',
                        'edit'            => 'Modifica',
                        'delete'          => 'Elimina',
                        'actions'         => 'Azioni',
                    ],

                    'create'  => [
                        'file-name'      => 'Nome File',
                        'file-name-info' => 'Esempio: sitemap.xml',
                        'path'           => 'Percorso',
                        'path-info'      => 'Esempio: "/sitemap/" o "/" per il percorso di base',
                        'save-btn'       => 'Salva Mappa del Sito',
                        'title'          => 'Crea Mappa del Sito',
                        'success'        => 'Mappa del Sito creata con successo',
                        'delete-warning' => 'Sei sicuro di voler eseguire questa azione?',
                    ],

                    'edit' => [
                        'title'          => 'Modifica Sitemap',
                        'success'        => 'Sitemap aggiornata con successo',
                        'delete-success' => 'Sitemap eliminata con successo',
                    ],
                ],

                'edit'  => [
                    'back-btn'       => 'Indietro',
                    'file-name'      => 'Nome File',
                    'file-name-info' => 'Esempio: sitemap.xml',
                    'general'        => 'Generale',
                    'path'           => 'Percorso',
                    'path-info'      => 'Esempio: "/sitemap/" o "/" per il percorso di base',
                    'save-btn'       => 'Salva Mappa del Sito',
                ],

                'delete-failed'  => ':name Eliminato Fallito',
            ],

            'url-rewrites' => [
                'index' => [
                    'title'      => 'Riscritture URL',
                    'create-btn' => 'Crea Riscrittura URL',

                    'datagrid' => [
                        'id'                  => 'ID',
                        'for'                 => 'Per',
                        'request-path'        => 'Percorso Richiesto',
                        'target-path'         => 'Percorso di Destinazione',
                        'redirect-type'       => 'Tipo di Reindirizzamento',
                        'locale'              => 'Località',
                        'edit'                => 'Modifica',
                        'delete'              => 'Elimina',
                        'actions'             => 'Azioni',
                        'mass-delete-success' => 'Riscritture URL Selezionate Eliminate con Successo',
                    ],

                    'create' => [
                        'for'                => 'Per',
                        'product'            => 'Prodotto',
                        'category'           => 'Categoria',
                        'cms-page'           => 'Pagina CMS',
                        'request-path'       => 'Percorso Richiesto',
                        'target-path'        => 'Percorso di Destinazione',
                        'redirect-type'      => 'Tipo di Reindirizzamento',
                        'temporary-redirect' => 'Temporaneo (302)',
                        'permanent-redirect' => 'Permanente (301)',
                        'locale'             => 'Località',
                        'save-btn'           => 'Salva Riscrittura URL',
                        'title'              => 'Crea Riscrittura URL',
                        'success'            => 'Riscrittura URL creata con successo',
                        'delete-warning'     => 'Sei sicuro di voler eseguire questa azione?',
                    ],

                    'edit' => [
                        'title'          => 'Modifica Riscrittura URL',
                        'success'        => 'Riscrittura URL aggiornata con successo',
                        'delete-success' => 'Riscrittura URL eliminata con successo',
                    ],
                ],
            ],
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ],
    ],

    'cms' => [
        'index' => [
            'title'             => 'Pagine',
            'create-btn'        => 'Crea Pagina',
<<<<<<< HEAD
            'already-taken'     => ':name è già stato preso.',

            'datagrid' => [
                'id'                  => 'ID',
                'page-title'          => 'Titolo Pagina',
                'url-key'             => 'Chiave URL',
                'view'                => 'Visualizza',
                'edit'                => 'Modifica',
                'delete'              => 'Elimina',
                'mass-delete-success' => 'Dati selezionati eliminati con successo',
=======
            'already-taken'     => 'Il :name è già stato preso.',

            'datagrid' => [
                'id'                  => 'ID',
                'page-title'          => 'Titolo della Pagina',
                'url-key'             => 'Chiave dell\'URL',
                'view'                => 'Vista',
                'edit'                => 'Modifica',
                'delete'              => 'Elimina',
                'mass-delete-success' => 'Dati Selezionati Eliminati con Successo',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ],
        ],

        'create' => [
<<<<<<< HEAD
            'title'             => 'Crea Pagina',
            'save-btn'          => 'Salva Pagina',
            'general'           => 'Generale',
            'page-title'        => 'Titolo',
            'channels'          => 'Canali',
            'content'           => 'Contenuto',
            'meta-keywords'     => 'Meta Parole Chiave',
            'meta-description'  => 'Meta Descrizione',
            'meta-title'        => 'Meta Titolo',
            'seo'               => 'SEO',
            'url-key'           => 'Chiave URL',
            'description'       => 'Descrizione',
=======
            'title'            => 'Crea Pagina',
            'save-btn'         => 'Salva Pagina',
            'general'          => 'Generale',
            'page-title'       => 'Titolo',
            'channels'         => 'Canali',
            'content'          => 'Contenuto',
            'meta-keywords'    => 'Meta Keywords',
            'meta-description' => 'Meta Description',
            'meta-title'       => 'Meta Title',
            'seo'              => 'SEO',
            'url-key'          => 'Chiave dell\'URL',
            'description'      => 'Descrizione',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ],

        'edit' => [
            'title'            => 'Modifica Pagina',
            'preview-btn'      => 'Anteprima Pagina',
            'save-btn'         => 'Salva Pagina',
            'general'          => 'Generale',
<<<<<<< HEAD
            'page-title'       => 'Titolo Pagina',
=======
            'page-title'       => 'Titolo della Pagina',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            'back-btn'         => 'Indietro',
            'channels'         => 'Canali',
            'content'          => 'Contenuto',
            'seo'              => 'SEO',
<<<<<<< HEAD
            'meta-keywords'    => 'Meta Parole Chiave',
            'meta-description' => 'Meta Descrizione',
            'meta-title'       => 'Meta Titolo',
            'url-key'          => 'Chiave URL',
            'description'      => 'Descrizione',
        ],

        'create-success'  => 'CMS creato con successo.',
        'delete-success'  => 'CMS eliminato con successo.',
        'update-success'  => 'CMS aggiornato con successo.',
        'no-resource'     => 'Risorsa non esiste.',
=======
            'meta-keywords'    => 'Meta Keywords',
            'meta-description' => 'Meta Description',
            'meta-title'       => 'Meta Title',
            'url-key'          => 'Chiave dell\'URL',
            'description'      => 'Descrizione',
        ],

        'create-success' => 'CMS creato con successo.',
        'delete-success' => 'CMS eliminato con successo.',
        'update-success' => 'CMS aggiornato con successo.',
        'no-resource'    => 'La risorsa non esiste.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    ],

    'settings' => [
        'locales' => [
            'index' => [
<<<<<<< HEAD
                'title'      => 'Localidades',
                'locale'     => 'Localidad',
                'create-btn' => 'Crear Localidad',
                'logo-size'  => 'La risoluzione dell\'immagine dovrebbe essere come 24px x 16px',

                'datagrid' => [
                    'actions'   => 'Acciones',
                    'id'        => 'ID',
                    'name'      => 'Nombre',
                    'code'      => 'Código',
                    'direction' => 'Dirección',
                    'ltr'       => 'LTR',
                    'rtl'       => 'RTL',
                    'edit'      => 'Editar',
                    'delete'    => 'Eliminar',
                ],

                'create' => [
                    'code'             => 'Código',
                    'name'             => 'Nombre',
                    'direction'        => 'Dirección',
                    'locale-logo'      => 'Logo de Localidad',
                    'title'            => 'Crear Localidad',
                    'save-btn'         => 'Guardar Localidad',
                    'select-direction' => 'Seleziona direzione',
                ],

                'edit' => [
                    'title' => 'Editar Localidad',
                ],

                'create-success'    => 'Localidad creada exitosamente.',
                'update-success'    => 'Localidad actualizada exitosamente.',
                'delete-success'    => 'Localidad eliminada exitosamente.',
                'last-delete-error' => 'Se requiere al menos una Localidad.',
                'delete-warning'    => '¿Estás seguro de que deseas realizar esta acción?',
                'delete-failed'     => 'Error en la eliminación de la Localidad',
=======
                'title'      => 'Località',
                'locale'     => 'Locale',
                'create-btn' => 'Crea Locale',
                'logo-size'  => 'La risoluzione dell\'immagine dovrebbe essere di 24px x 16px',

                'datagrid' => [
                    'actions'   => 'Azioni',
                    'id'        => 'ID',
                    'name'      => 'Nome',
                    'code'      => 'Codice',
                    'direction' => 'Direzione',
                    'ltr'       => 'LTR',
                    'rtl'       => 'RTL',
                    'edit'      => 'Modifica',
                    'delete'    => 'Elimina',
                ],

                'create' => [
                    'code'             => 'Codice',
                    'name'             => 'Nome',
                    'direction'        => 'Direzione',
                    'locale-logo'      => 'Logo Locale',
                    'title'            => 'Crea Locale',
                    'save-btn'         => 'Salva Locale',
                    'select-direction' => 'Seleziona Direzione',
                ],

                'edit' => [
                    'title' => 'Modifica Locale',
                ],

                'create-success'    => 'Locale creato con successo.',
                'update-success'    => 'Locale aggiornato con successo.',
                'delete-success'    => 'Locale eliminato con successo.',
                'last-delete-error' => 'È richiesto almeno un Locale.',
                'delete-warning'    => 'Sei sicuro di voler eseguire questa azione?',
                'delete-failed'     => 'Eliminazione del Locale fallita',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ],
        ],

        'currencies' => [
            'index' => [
<<<<<<< HEAD
                'title'      => 'Monedas',
                'create-btn' => 'Crear Moneda',
                'currency'   => 'Moneda',

                'datagrid' => [
                    'id'             => 'ID',
                    'name'           => 'Nombre',
                    'code'           => 'Código',
                    'edit'           => 'Editar',
                    'delete'         => 'Eliminar',
                    'actions'        => 'Acciones',
                    'partial-action' => 'Algunas acciones no se realizaron debido a restricciones del sistema en :resource',
                    'update-success' => ':resource seleccionadas se actualizaron correctamente',
                    'no-resource'    => 'El recurso proporcionado no es suficiente para la acción',
                    'method-error'   => '¡Error! Se detectó un método incorrecto, por favor, verifique la configuración de la acción masiva',
                ],

                'create' => [
                    'create-btn'     => 'Crear Moneda',
                    'code'           => 'Código',
                    'decimal'        => 'Decimal',
                    'delete-warning' => '¿Estás seguro de que deseas realizar esta acción?',
                    'general'        => 'General',
                    'name'           => 'Nombre',
                    'save-btn'       => 'Guardar Moneda',
                    'symbol'         => 'Símbolo',
                    'title'          => 'Crear Nueva Moneda',
                ],

                'edit' => [
                    'title' => 'Editar Moneda',
                ],

                'create-success'    => 'Moneda creada exitosamente.',
                'delete-success'    => 'Moneda eliminada exitosamente.',
                'delete-failed'     => 'Error al eliminar la Moneda',
                'last-delete-error' => 'Se requiere al menos una Moneda.',
                'update-success'    => 'Moneda actualizada exitosamente.',
=======
                'title'      => 'Valute',
                'create-btn' => 'Crea Valuta',
                'currency'   => 'Valuta',

                'datagrid' => [
                    'id'             => 'ID',
                    'name'           => 'Nome',
                    'code'           => 'Codice',
                    'edit'           => 'Modifica',
                    'delete'         => 'Elimina',
                    'actions'        => 'Azioni',
                    'partial-action' => 'Alcune azioni non sono state eseguite a causa di vincoli di sistema restrittivi su :resource',
                    'update-success' => ':resource selezionate aggiornate con successo',
                    'no-resource'    => 'La risorsa fornita è insufficiente per l\'azione',
                    'method-error'   => 'Errore! Metodo errato rilevato, controlla la configurazione delle azioni di massa',
                ],

                'create' => [
                    'create-btn'     => 'Crea Valuta',
                    'code'           => 'Codice',
                    'decimal'        => 'Decimale',
                    'delete-warning' => 'Sei sicuro di voler eseguire questa azione?',
                    'general'        => 'Generale',
                    'name'           => 'Nome',
                    'save-btn'       => 'Salva Valuta',
                    'symbol'         => 'Simbolo',
                    'title'          => 'Crea Nuova Valuta',
                ],

                'edit' => [
                    'title' => 'Modifica Valuta',
                ],

                'create-success'    => 'Valuta creata con successo.',
                'delete-success'    => 'Valuta eliminata con successo.',
                'delete-failed'     => 'Eliminazione della Valuta fallita',
                'last-delete-error' => 'È richiesta almeno una Valuta.',
                'update-success'    => 'Valuta aggiornata con successo.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ],
        ],

        'exchange-rates' => [
            'index' => [
<<<<<<< HEAD
                'title'         => 'Tasas de Cambio',
                'create-btn'    => 'Crear Tasa de Cambio',
                'exchange-rate' => 'Tasa de Cambio',
                'update-rates'  => 'Actualizar Tasa de Cambio',

                'create' => [
                    'delete-warning'         => '¿Estás seguro de que deseas realizar esta acción?',
                    'title'                  => 'Crear Tasa de Cambio',
                    'rate'                   => 'Tasa',
                    'save-btn'               => 'Guardar Tasa de Cambio',
                    'source-currency'        => 'Moneda Fuente',
                    'select-target-currency' => 'Seleziona la valuta di destinazione',
                    'target-currency'        => 'Moneda Objetivo',
                ],

                'edit' => [
                    'title' => 'Editar Tasas de Cambio',
=======
                'title'         => 'Tassi di Cambio',
                'create-btn'    => 'Crea Tasso di Cambio',
                'exchange-rate' => 'Tasso di Cambio',
                'update-rates'  => 'Aggiorna Tassi di Cambio',

                'create' => [
                    'delete-warning'         => 'Sei sicuro di voler eseguire questa azione?',
                    'title'                  => 'Crea Tasso di Cambio',
                    'rate'                   => 'Tasso',
                    'save-btn'               => 'Salva Tasso di Cambio',
                    'source-currency'        => 'Valuta di Origine',
                    'select-target-currency' => 'Seleziona Valuta di Destinazione',
                    'target-currency'        => 'Valuta di Destinazione',
                ],

                'edit' => [
                    'title' => 'Modifica Tassi di Cambio',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                ],

                'datagrid' => [
                    'id'            => 'ID',
<<<<<<< HEAD
                    'currency-name' => 'Nombre de la Moneda',
                    'exchange-rate' => 'Tasa de Cambio',
                    'edit'          => 'Editar',
                    'delete'        => 'Eliminar',
                    'actions'       => 'Acciones',
                ],

                'create-success' => 'Tasa de Cambio Creada Exitosamente',
                'update-success' => 'Tasa de Cambio Actualizada Exitosamente',
                'delete-success' => 'Tasa de Cambio Eliminada Exitosamente',
                'delete-error'   => 'Error al Eliminar la Tasa de Cambio',
=======
                    'currency-name' => 'Nome Valuta',
                    'exchange-rate' => 'Tasso di Cambio',
                    'edit'          => 'Modifica',
                    'delete'        => 'Elimina',
                    'actions'       => 'Azioni',
                ],

                'create-success'  => 'Tasso di Cambio Creato con Successo',
                'update-success'  => 'Tasso di Cambio Aggiornato con Successo',
                'delete-success'  => 'Tasso di Cambio Eliminato con Successo',
                'delete-error'    => 'Errore durante l\'eliminazione del Tasso di Cambio',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ],
        ],

        'inventory-sources' => [
<<<<<<< HEAD
            'index' => [
                'title'      => 'Fuentes de Inventario',
                'create-btn' => 'Crear Fuente de Inventario',

                'datagrid' => [
                    'id'       => 'ID',
                    'code'     => 'Código',
                    'name'     => 'Nombre',
                    'priority' => 'Prioridad',
                    'status'   => 'Estado',
                    'active'   => 'Activa',
                    'inactive' => 'Inactiva',
                    'edit'     => 'Editar',
                    'delete'   => 'Eliminar',
=======
            'index'  => [
                'create-btn' => 'Crea fonte inventario',
                'title'      => 'Sorgenti di Inventario',

                'datagrid' => [
                    'id'       => 'ID',
                    'code'     => 'Codice',
                    'name'     => 'Nome',
                    'priority' => 'Priorità',
                    'status'   => 'Stato',
                    'active'   => 'Attivo',
                    'inactive' => 'Inattivo',
                    'edit'     => 'Modifica',
                    'delete'   => 'Elimina',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                ],
            ],

            'create' => [
<<<<<<< HEAD
                'add-title'      => 'Agregar Fuente de Inventario',
                'title'          => 'Fuentes de Inventario',
                'general'        => 'General',
                'save-btn'       => 'Guardar Fuentes de Inventario',
                'code'           => 'Código',
                'back-btn'       => 'Atrás',
                'name'           => 'Nombre',
                'description'    => 'Descripción',
                'latitude'       => 'Latitud',
                'longitude'      => 'Longitud',
                'priority'       => 'Prioridad',
                'status'         => 'Estado',
                'contact-info'   => 'Información de Contacto',
                'contact-name'   => 'Nombre',
                'contact-email'  => 'Correo Electrónico',
                'contact-number' => 'Número de Contacto',
                'contact-fax'    => 'Fax',
                'address'        => 'Dirección de la Fuente',
                'country'        => 'País',
                'select-country' => 'Seleccionar País',
                'state'          => 'Estado',
                'select-state'   => 'Seleccionar Estado',
                'city'           => 'Ciudad',
                'street'         => 'Calle',
                'postcode'       => 'Código Postal',
                'settings'       => 'Configuraciones',
            ],

            'edit' => [
                'title'             => 'Editar Fuentes de Inventario',
                'general'           => 'General',
                'save-btn'          => 'Guardar Fuentes de Inventario',
                'back-btn'          => 'Atrás',
                'code'              => 'Código',
                'name'              => 'Nombre',
                'description'       => 'Descripción',
                'latitude'          => 'Latitud',
                'longitude'         => 'Longitud',
                'priority'          => 'Prioridad',
                'status'            => 'Estado',
                'contact-info'      => 'Información de Contacto',
                'contact-name'      => 'Nombre',
                'contact-email'     => 'Correo Electrónico',
                'contact-number'    => 'Número de Contacto',
                'contact-fax'       => 'Fax',
                'source-address'    => 'Dirección de la Fuente',
                'country'           => 'País',
                'select-country'    => 'Seleccionar País',
                'state'             => 'Estado',
                'select-state'      => 'Seleccionar Estado',
                'city'              => 'Ciudad',
                'street'            => 'Calle',
                'postcode'          => 'Código Postal',
                'settings'          => 'Configuraciones',
            ],

            'create-success'    => 'Fuente de Inventario creada exitosamente',
            'delete-success'    => 'Fuentes de Inventario eliminadas exitosamente',
            'delete-failed'     => 'Error al eliminar las Fuentes de Inventario',
            'last-delete-error' => 'No se pueden eliminar las últimas Fuentes de Inventario',
            'update-success'    => 'Fuentes de Inventario actualizadas exitosamente',
=======
                'add-title'      => 'Aggiungi Sorgente di Inventario',
                'title'          => 'Sorgenti di Inventario',
                'general'        => 'Generale',
                'save-btn'       => 'Salva Sorgenti di Inventario',
                'code'           => 'Codice',
                'back-btn'       => 'Indietro',
                'name'           => 'Nome',
                'description'    => 'Descrizione',
                'latitude'       => 'Latitudine',
                'longitude'      => 'Longitudine',
                'priority'       => 'Priorità',
                'status'         => 'Stato',
                'contact-info'   => 'Informazioni di Contatto',
                'contact-name'   => 'Nome',
                'contact-email'  => 'Email',
                'contact-number' => 'Numero di Contatto',
                'contact-fax'    => 'Fax',
                'address'        => 'Indirizzo della Sorgente',
                'country'        => 'Paese',
                'select-country' => 'Seleziona Paese',
                'state'          => 'Stato',
                'select-state'   => 'Seleziona Stato',
                'city'           => 'Città',
                'street'         => 'Via',
                'postcode'       => 'CAP',
                'settings'       => 'Impostazioni',
            ],

            'edit' => [
                'title'          => 'Modifica Sorgenti di Inventario',
                'general'        => 'Generale',
                'save-btn'       => 'Salva Sorgenti di Inventario',
                'back-btn'       => 'Indietro',
                'code'           => 'Codice',
                'name'           => 'Nome',
                'description'    => 'Descrizione',
                'latitude'       => 'Latitudine',
                'longitude'      => 'Longitudine',
                'priority'       => 'Priorità',
                'status'         => 'Stato',
                'contact-info'   => 'Informazioni di Contatto',
                'contact-name'   => 'Nome',
                'contact-email'  => 'Email',
                'contact-number' => 'Numero di Contatto',
                'contact-fax'    => 'Fax',
                'source-address' => 'Indirizzo della Sorgente',
                'country'        => 'Paese',
                'select-country' => 'Seleziona Paese',
                'state'          => 'Stato',
                'select-state'   => 'Seleziona Stato',
                'city'           => 'Città',
                'street'         => 'Via',
                'postcode'       => 'CAP',
                'settings'       => 'Impostazioni',
            ],

            'create-success'    => 'Sorgente di Inventario Creata con Successo',
            'delete-success'    => 'Sorgenti di Inventario Eliminate con Successo',
            'delete-failed'     => 'Eliminazione delle Sorgenti di Inventario Fallita',
            'last-delete-error' => 'Impossibile Eliminare l\'Ultima Sorgente di Inventario',
            'update-success'    => 'Sorgenti di Inventario Aggiornate con Successo',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ],

        'taxes' => [
            'categories' => [
                'index' => [
<<<<<<< HEAD
                    'title'           => 'Categorías de Impuestos',
                    'tax-category'    => 'Categoría de Impuesto',
                    'delete-warning'  => '¿Estás seguro de que deseas eliminar?',

                    'datagrid' => [
                        'id'      => 'ID',
                        'name'    => 'Nombre',
                        'code'    => 'Código',
                        'edit'    => 'Editar',
                        'delete'  => 'Eliminar',
                        'actions' => 'Acciones',
                    ],

                    'create' => [
                        'title'           => 'Crear Categoría de Impuesto',
                        'code'            => 'Código',
                        'description'     => 'Descripción',
                        'general'         => 'Categoría de Impuesto',
                        'name'            => 'Nombre',
                        'save-btn'        => 'Guardar Categoría de Impuesto',
                        'tax-rates'       => 'Tasas de Impuesto',
                        'select'          => 'Seleccionar',
                        'add-tax-rates'   => 'Agregar Tasas de Impuesto',
                        'empty-text'      => 'No hay Tasas de Impuesto disponibles, por favor crea nuevas Tasas de Impuesto.',
                    ],

                    'edit'  => [
                        'title'   => 'Editar Categorías de Impuestos',
                    ],

                    'create-success'  => 'Nueva Categoría de Impuesto creada',
                    'update-success'  => 'Categoría de Impuesto actualizada exitosamente',
                    'delete-success'  => 'Categoría de Impuesto eliminada exitosamente',
                    'delete-failed'   => 'Error al eliminar la Categoría de Impuesto',
=======
                    'title'          => 'Categorie Fiscali',
                    'tax-category'   => 'Categoria Fiscale',
                    'delete-warning' => 'Sei sicuro di voler eliminare?',

                    'datagrid' => [
                        'id'      => 'ID',
                        'name'    => 'Nome',
                        'code'    => 'Codice',
                        'edit'    => 'Modifica',
                        'delete'  => 'Elimina',
                        'actions' => 'Azioni',
                    ],

                    'create' => [
                        'title'         => 'Crea Categoria Fiscale',
                        'code'          => 'Codice',
                        'description'   => 'Descrizione',
                        'general'       => 'Categoria Fiscale',
                        'name'          => 'Nome',
                        'save-btn'      => 'Salva Categoria Fiscale',
                        'tax-rates'     => 'Aliquote Fiscali',
                        'select'        => 'Seleziona',
                        'add-tax-rates' => 'Aggiungi Aliquote Fiscali',
                        'empty-text'    => 'Le Aliquote Fiscali non sono disponibili, crea nuove Aliquote Fiscali.',
                    ],

                    'edit'  => [
                        'title'   => 'Modifica Categorie Fiscali',
                    ],

                    'create-success'  => 'Nuova Categoria Fiscale Creata',
                    'update-success'  => 'Categoria Fiscale Aggiornata con Successo',
                    'delete-success'  => 'Categoria Fiscale Eliminata con Successo',
                    'delete-failed'   => 'Eliminazione Categoria Fiscale Fallita',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                ],
            ],

            'rates'   => [
                'index' => [
<<<<<<< HEAD
                    'title'        => 'Tasas de Impuesto',
                    'tax-rate'     => 'Tasa de Impuesto',
                    'button-title' => 'Crear Tasas de Impuesto',

                    'datagrid' => [
                        'id'         => 'ID',
                        'identifier' => 'Identificador',
                        'state'      => 'Estado',
                        'country'    => 'País',
                        'zip-code'   => 'Código Postal',
                        'zip-from'   => 'Desde Código Postal',
                        'zip-to'     => 'Hasta Código Postal',
                        'tax-rate'   => 'Tasa de Impuesto',
                        'edit'       => 'Editar',
                        'delete'     => 'Eliminar',
                    ],
                ],

                'create' => [
                    'country'        => 'Paese',
                    'back-btn'       => 'Indietro',
                    'general'        => 'Generale',
                    'is-zip'         => 'Abilita Intervallo di CAP',
                    'identifier'     => 'Identificatore',
                    'select-country' => 'Seleziona Paese',
                    'select-state'   => 'Seleziona Stato',
                    'save-btn'       => 'Salva Tariffa Fiscale',
                    'settings'       => 'Impostazioni',
                    'state'          => 'Stato',
                    'title'          => 'Crea Tariffa Fiscale',
=======
                    'button-title' => 'Crea aliquota fiscale',
                    'tax-rate'     => 'Aliquota Fiscale',
                    'title'        => 'Aliquote Fiscali',

                    'import' => [
                        'duplicate-error'  => 'L\'identificatore deve essere unico, identificatore duplicato :identifier alla riga :position.',
                        'enough-row-error' => 'Il file non ha abbastanza righe',
                        'import-btn'       => 'Importa',
                        'title'            => 'Carica',
                        'upload-error'     => 'Il file deve essere di tipo: xls, xlsx, csv.',
                        'upload-success'   => 'Tasso di imposta caricato con successo',
                        'validation'       => 'Tipo consentito: xls, xlsx, csv.',
                    ],

                    'datagrid' => [
                        'id'         => 'ID',
                        'identifier' => 'Identificatore',
                        'state'      => 'Stato',
                        'country'    => 'Paese',
                        'zip-code'   => 'CAP',
                        'zip-from'   => 'CAP Da',
                        'zip-to'     => 'CAP A',
                        'tax-rate'   => 'Aliquota Fiscale',
                        'edit'       => 'Modifica',
                        'delete'     => 'Elimina',
                    ],
                ],

                'create'  => [
                    'country'        => 'Paese',
                    'back-btn'       => 'Indietro',
                    'general'        => 'Generale',
                    'is-zip'         => 'Abilita Intervallo CAP',
                    'identifier'     => 'Identificatore',
                    'select-country' => 'Seleziona Paese',
                    'select-state'   => 'Seleziona Stato',
                    'save-btn'       => 'Salva Aliquota Fiscale',
                    'settings'       => 'Impostazioni',
                    'state'          => 'Stato',
                    'title'          => 'Crea Aliquota Fiscale',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'tax-rate'       => 'Aliquota',
                    'zip-code'       => 'CAP',
                    'zip-from'       => 'CAP Da',
                    'zip-to'         => 'CAP A',
                ],

<<<<<<< HEAD
                'edit' => [
                    'basic-settings'  => 'Impostazioni di Base',
                    'country'         => 'Paese',
                    'back-btn'        => 'Indietro',
                    'identifier'      => 'Identificatore',
                    'select-country'  => 'Seleziona Paese',
                    'select-state'    => 'Seleziona Stato',
                    'save-btn'        => 'Salva Tasso Fiscale',
                    'state'           => 'Stato',
                    'title'           => 'Modifica Tasso Fiscale',
                    'tax_rate'        => 'Aliquota',
                    'zip_code'        => 'CAP',
                    'zip_from'        => 'Da CAP',
                    'zip_to'          => 'A CAP',
                ],

                'create-success' => 'Tasa de Impuesto creada exitosamente.',
                'delete-failed'  => 'Error al eliminar la Tasa de Impuesto',
                'delete-success' => 'Tasa de Impuesto eliminada exitosamente',
                'update-success' => 'Tasa de Impuesto actualizada exitosamente',
=======
                'edit'  => [
                    'basic-settings' => 'Impostazioni di Base',
                    'country'        => 'Paese',
                    'back-btn'       => 'Indietro',
                    'identifier'     => 'Identificatore',
                    'select-country' => 'Seleziona Paese',
                    'select-state'   => 'Seleziona Stato',
                    'save-btn'       => 'Salva Aliquota Fiscale',
                    'state'          => 'Stato',
                    'title'          => 'Modifica Aliquota Fiscale',
                    'tax-rate'       => 'Aliquota',
                    'zip-code'       => 'CAP',
                    'zip-from'       => 'CAP Da',
                    'zip-to'         => 'CAP A',
                ],

                'create-success' => 'Aliquota Fiscale creata con successo.',
                'delete-failed'  => 'Eliminazione Aliquota Fiscale fallita',
                'delete-success' => 'Aliquota Fiscale eliminata con successo',
                'update-success' => 'Aggiornamento Aliquota Fiscale riuscito',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ],
        ],

        'channels' => [
            'index' => [
<<<<<<< HEAD
                'title'             => 'Canales',
                'create-btn'        => 'Crear Canal',
                'delete-success'    => 'Canal eliminado exitosamente.',
                'delete-failed'     => 'Error al eliminar Canal',
                'last-delete-error' => 'Error al eliminar el último Canal.',

                'datagrid' => [
                    'id'        => 'ID',
                    'code'      => 'Código',
                    'name'      => 'Nombre',
                    'host-name' => 'Nombre del Host',
                    'edit'      => 'Editar',
                    'delete'    => 'Eliminar',
=======
                'title'             => 'Canali',
                'create-btn'        => 'Crea Canale',
                'delete-success'    => 'Canale eliminato con successo.',
                'delete-failed'     => 'Eliminazione Canale fallita',
                'last-delete-error' => 'Ultima eliminazione Canale fallita.',

                'datagrid' => [
                    'id'        => 'ID',
                    'code'      => 'Codice',
                    'name'      => 'Nome',
                    'host-name' => 'Nome Host',
                    'edit'      => 'Modifica',
                    'delete'    => 'Elimina',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                ],
            ],

            'create' => [
<<<<<<< HEAD
                'title'                   => 'Crear Canal',
                'cancel'                  => 'Atrás',
                'save-btn'                => 'Guardar Canal',
                'general'                 => 'General',
                'code'                    => 'Código',
                'name'                    => 'Nombre',
                'description'             => 'Descripción',
                'inventory-sources'       => 'Fuentes de Inventario',
                'root-category'           => 'Categoría Raíz',
                'hostname'                => 'Nombre del Host',
                'hostname-placeholder'    => 'https://www.example.com (No agregar barra al final.)',
                'design'                  => 'Diseño',
                'theme'                   => 'Tema',
                'logo'                    => 'Logotipo',
                'allowed-ips'             => 'IPs Permitidas',
                'logo-size'               => 'La resolución de la imagen debe ser de 192px x 50px',
                'favicon'                 => 'Favicon',
                'favicon-size'            => 'La resolución de la imagen debe ser de 16px x 16px',
                'seo'                     => 'SEO de la página de inicio',
                'seo-title'               => 'Título Meta',
                'seo-description'         => 'Descripción Meta',
                'seo-keywords'            => 'Palabras Clave Meta',
                'currencies-and-locales'  => 'Monedas y Locales',
                'locales'                 => 'Locales',
                'default-locale'          => 'Local Predeterminado',
                'currencies'              => 'Monedas',
                'default-currency'        => 'Moneda Predeterminada',
                'last-delete-error'       => 'Se requiere al menos un Canal.',
                'settings'                => 'Configuraciones',
                'status'                  => 'Estado',
                'select-root-category'    => 'Seleziona categoria radice',
                'select-theme'            => 'Seleziona tema',
                'select-default-locale'   => 'Seleziona lingua predefinita',
                'select-default-currency' => 'Seleziona valuta predefinita',
                'maintenance-mode-text'   => 'Mensaje',
                'create-success'          => 'Canal creado exitosamente.',
            ],

            'edit' => [
                'title'                  => 'Editar Canal',
                'back-btn'               => 'Atrás',
                'save-btn'               => 'Guardar Canal',
                'general'                => 'General',
                'code'                   => 'Código',
                'name'                   => 'Nombre',
                'description'            => 'Descripción',
                'inventory-sources'      => 'Fuentes de Inventario',
                'root-category'          => 'Categoría Raíz',
                'hostname'               => 'Nombre del Host',
                'hostname-placeholder'   => 'https://www.example.com (No agregar barra al final.)',
                'design'                 => 'Diseño',
                'theme'                  => 'Tema',
                'logo'                   => 'Logotipo',
                'allowed-ips'            => 'IPs Permitidas',
                'logo-size'              => 'La resolución de la imagen debe ser de 192px x 50px',
                'favicon'                => 'Favicon',
                'favicon-size'           => 'La resolución de la imagen debe ser de 16px x 16px',
                'seo'                    => 'SEO de la página de inicio',
                'seo-title'              => 'Título Meta',
                'seo-description'        => 'Descripción Meta',
                'seo-keywords'           => 'Palabras Clave Meta',
                'currencies-and-locales' => 'Monedas y Locales',
                'locales'                => 'Locales',
                'default-locale'         => 'Local Predeterminado',
                'currencies'             => 'Monedas',
                'default-currency'       => 'Moneda Predeterminada',
                'last-delete-error'      => 'Se requiere al menos un Canal.',
                'settings'               => 'Configuraciones',
                'status'                 => 'Estado',
                'maintenance-mode-text'  => 'Mensaje',
                'update-success'         => 'Canal actualizado exitosamente.',
=======
                'title'                   => 'Crea Canale',
                'cancel'                  => 'Indietro',
                'save-btn'                => 'Salva Canale',
                'general'                 => 'Generale',
                'code'                    => 'Codice',
                'name'                    => 'Nome',
                'description'             => 'Descrizione',
                'inventory-sources'       => 'Sorgenti Inventario',
                'root-category'           => 'Categoria Radice',
                'hostname'                => 'Hostname',
                'hostname-placeholder'    => 'https://www.esempio.com (Non aggiungere la barra alla fine.)',
                'design'                  => 'Design',
                'theme'                   => 'Tema',
                'logo'                    => 'Logo',
                'allowed-ips'             => 'IP consentiti',
                'logo-size'               => 'La risoluzione dell\'immagine dovrebbe essere di 192px X 50px',
                'favicon'                 => 'Favicon',
                'favicon-size'            => 'La risoluzione dell\'immagine dovrebbe essere di 16px X 16px',
                'seo'                     => 'SEO della pagina principale',
                'seo-title'               => 'Meta titolo',
                'seo-description'         => 'Meta descrizione',
                'seo-keywords'            => 'Meta parole chiave',
                'currencies-and-locales'  => 'Valute e Localizzazioni',
                'locales'                 => 'Localizzazioni',
                'default-locale'          => 'Localizzazione predefinita',
                'currencies'              => 'Valute',
                'default-currency'        => 'Valuta predefinita',
                'last-delete-error'       => 'È richiesto almeno un Canale.',
                'settings'                => 'Impostazioni',
                'status'                  => 'Stato',
                'select-root-category'    => 'Seleziona Categoria Radice',
                'select-theme'            => 'Seleziona Tema',
                'select-default-locale'   => 'Seleziona Localizzazione Predefinita',
                'select-default-currency' => 'Seleziona Valuta Predefinita',
                'maintenance-mode-text'   => 'Messaggio',
                'create-success'          => 'Canale creato con successo.',
            ],

            'edit' => [
                'allowed-ips'            => 'IP consentiti',
                'back-btn'               => 'Indietro',
                'code'                   => 'Codice',
                'currencies-and-locales' => 'Valute e Localizzazioni',
                'currencies'             => 'Valute',
                'default-currency'       => 'Valuta predefinita',
                'default-locale'         => 'Localizzazione predefinita',
                'description'            => 'Descrizione',
                'design'                 => 'Design',
                'favicon-size'           => 'La risoluzione dell\'immagine dovrebbe essere di 16px X 16px',
                'favicon'                => 'Favicon',
                'general'                => 'Generale',
                'hostname-placeholder'   => 'https://www.esempio.com (Non aggiungere la barra alla fine.)',
                'hostname'               => 'Hostname',
                'inventory-sources'      => 'Sorgenti Inventario',
                'last-delete-error'      => 'È richiesto almeno un Canale.',
                'locales'                => 'Localizzazioni',
                'logo-size'              => 'La risoluzione dell\'immagine dovrebbe essere di 192px X 50px',
                'logo'                   => 'Logo',
                'maintenance-mode-text'  => 'Messaggio',
                'maintenance-mode'       => 'Modalità Manutenzione',
                'name'                   => 'Nome',
                'root-category'          => 'Categoria Radice',
                'save-btn'               => 'Salva Canale',
                'seo-description'        => 'Meta descrizione',
                'seo-keywords'           => 'Meta parole chiave',
                'seo-title'              => 'Meta titolo',
                'seo'                    => 'SEO della pagina principale',
                'status'                 => 'Stato',
                'theme'                  => 'Tema',
                'title'                  => 'Modifica Canale',
                'update-success'         => 'Aggiorna Canale con successo',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ],
        ],

        'users' => [
            'index' => [
<<<<<<< HEAD
                'admin' => 'Administrador',
                'title' => 'Usuarios',
                'user'  => 'Usuario',

                'create'  => [
                    'confirm-password'  => 'Confirmar Contraseña',
                    'email'             => 'Correo Electrónico',
                    'name'              => 'Nombre',
                    'password'          => 'Contraseña',
                    'role'              => 'Rol',
                    'status'            => 'Estado',
                    'save-btn'          => 'Guardar Usuario',
                    'title'             => 'Crear Usuario',
                    'upload-image-info' => 'Subir una Imagen de Perfil (110px X 110px) en Formato PNG o JPG',
                ],

                'datagrid' => [
                    'actions'   => 'Acciones',
                    'active'    => 'Activo',
                    'delete'    => 'Elimina',
                    'email'     => 'Correo Electrónico',
                    'edit'      => 'Editar',
                    'id'        => 'ID',
                    'inactive'  => 'Inactivo',
                    'name'      => 'Nombre',
                    'role'      => 'Rol',
                    'status'    => 'Estado',
                ],

                'edit'  => [
                    'title'    => 'Editar Usuario',
                ],
            ],

            'edit'  => [
                'back-btn'         => 'Atrás',
                'confirm-password' => 'Confirmar Contraseña',
                'email'            => 'Correo Electrónico',
                'general'          => 'General',
                'name'             => 'Nombre',
                'password'         => 'Contraseña',
                'role'             => 'Rol',
                'status'           => 'Estado',
                'save-btn'         => 'Guardar Usuario',
                'title'            => 'Editar Usuario',
            ],

            'activate-warning'   => 'Il tuo account non è ancora attivato, contatta l\'amministratore.',
            'cannot-change'      => 'Impossibile modificare l\'utente.',
            'create-success'     => 'Utente creato con successo.',
            'delete-failed'      => 'Eliminazione utente non riuscita.',
            'delete-success'     => 'Utente eliminato con successo.',
            'delete-warning'     => 'Sei sicuro di voler eseguire questa azione?',
            'incorrect-password' => 'Password errata',
            'login-error'        => 'Controlla le tue credenziali e riprova.',
            'last-delete-error'  => 'Eliminazione dell\'ultimo utente non riuscita.',
=======
                'admin' => 'Admin',
                'title' => 'Utenti',
                'user'  => 'Utente',

                'create' => [
                    'confirm-password'  => 'Conferma Password',
                    'email'             => 'Email',
                    'name'              => 'Nome',
                    'password'          => 'Password',
                    'role'              => 'Ruolo',
                    'status'            => 'Stato',
                    'save-btn'          => 'Salva Utente',
                    'title'             => 'Crea Utente',
                    'upload-image-info' => 'Carica un\'immagine del profilo (110px X 110px) in formato PNG o JPG',
                ],

                'datagrid' => [
                    'actions'  => 'Azioni',
                    'active'   => 'Attivo',
                    'delete'   => 'Elimina',
                    'email'    => 'Email',
                    'edit'     => 'Modifica',
                    'id'       => 'ID',
                    'inactive' => 'Inattivo',
                    'name'     => 'Nome',
                    'role'     => 'Ruolo',
                    'status'   => 'Stato',
                ],

                'edit' => [
                    'title' => 'Modifica Utente',
                ],
            ],

            'edit' => [
                'back-btn'         => 'Indietro',
                'confirm-password' => 'Conferma Password',
                'email'            => 'Email',
                'general'          => 'Generale',
                'name'             => 'Nome',
                'password'         => 'Password',
                'role'             => 'Ruolo',
                'status'           => 'Stato',
                'save-btn'         => 'Salva Utente',
                'title'            => 'Modifica Utente',
            ],

            'activate-warning'   => 'Il tuo account deve ancora essere attivato, contatta l\'amministratore.',
            'cannot-change'      => 'Impossibile modificare l\'utente',
            'create-success'     => 'Utente creato con successo.',
            'delete-failed'      => 'Eliminazione utente fallita.',
            'delete-success'     => 'Utente eliminato con successo.',
            'delete-warning'     => 'Sei sicuro di voler eseguire questa azione?',
            'incorrect-password' => 'Password incorretta',
            'login-error'        => 'Verifica le tue credenziali e riprova.',
            'last-delete-error'  => 'Ultima eliminazione utente fallita',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            'update-success'     => 'Utente aggiornato con successo.',
        ],

        'roles' => [
            'index' => [
<<<<<<< HEAD
                'create-btn' => 'Crear Rol',
                'title'      => 'Roles',

                'datagrid'  => [
                    'delete'            => 'Eliminar',
                    'edit'              => 'Editar',
                    'id'                => 'ID',
                    'name'              => 'Nombre',
                    'permission-type'   => 'Tipo de Permiso',
=======
                'create-btn' => 'Crea Ruolo',
                'title'      => 'Ruoli',

                'datagrid' => [
                    'delete'          => 'Elimina',
                    'edit'            => 'Modifica',
                    'id'              => 'Id',
                    'name'            => 'Nome',
                    'permission-type' => 'Tipo di Autorizzazione',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                ],
            ],

            'create' => [
<<<<<<< HEAD
                'access-control'  => 'Control de Acceso',
                'all'             => 'Todos',
                'back-btn'        => 'Atrás',
                'custom'          => 'Personalizado',
                'description'     => 'Descripción',
                'general'         => 'General',
                'name'            => 'Nombre',
                'permissions'     => 'Permisos',
                'save-btn'        => 'Guardar Rol',
                'title'           => 'Crear Rol',
            ],

            'edit' => [
                'access-control'  => 'Control de Acceso',
                'all'             => 'Todos',
                'back-btn'        => 'Atrás',
                'custom'          => 'Personalizado',
                'description'     => 'Descripción',
                'general'         => 'General',
                'name'            => 'Nombre',
                'permissions'     => 'Permisos',
                'save-btn'        => 'Guardar Rol',
                'title'           => 'Editar Rol',
            ],

            'being-used'         => 'El Rol ya está siendo utilizado por un Usuario Administrador',
            'create-success'     => 'Roles Creados Exitosamente',
            'delete-success'     => 'Rol Eliminado Exitosamente',
            'delete-failed'      => 'Error al eliminar el Rol',
            'last-delete-error'  => 'El último Rol no puede ser eliminado',
            'update-success'     => 'Rol Actualizado Exitosamente',
=======
                'access-control' => 'Controllo Accessi',
                'all'            => 'Tutti',
                'back-btn'       => 'Indietro',
                'custom'         => 'Personalizzato',
                'description'    => 'Descrizione',
                'general'        => 'Generale',
                'name'           => 'Nome',
                'permissions'    => 'Autorizzazioni',
                'save-btn'       => 'Salva Ruolo',
                'title'          => 'Crea Ruolo',
            ],

            'edit' => [
                'access-control' => 'Controllo Accessi',
                'all'            => 'Tutti',
                'back-btn'       => 'Indietro',
                'custom'         => 'Personalizzato',
                'description'    => 'Descrizione',
                'general'        => 'Generale',
                'name'           => 'Nome',
                'permissions'    => 'Autorizzazioni',
                'save-btn'       => 'Salva Ruolo',
                'title'          => 'Modifica Ruolo',
            ],

            'being-used'        => 'Il ruolo è già utilizzato nell\'Utente Amministratore',
            'create-success'    => 'Ruoli creati con successo',
            'delete-success'    => 'Il ruolo è stato eliminato con successo',
            'delete-failed'     => 'Eliminazione ruolo fallita',
            'last-delete-error' => 'Ultimo ruolo non può essere eliminato',
            'update-success'    => 'Il ruolo è stato aggiornato con successo',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ],

        'themes' => [
            'index' => [
                'create-btn' => 'Crea Tema',
                'title'      => 'Temi',

                'datagrid' => [
                    'active'       => 'Attivo',
                    'channel_name' => 'Nome Canale',
                    'delete'       => 'Elimina',
                    'inactive'     => 'Inattivo',
<<<<<<< HEAD
                    'id'           => 'ID',
=======
                    'id'           => 'Id',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'name'         => 'Nome',
                    'status'       => 'Stato',
                    'sort-order'   => 'Ordinamento',
                    'type'         => 'Tipo',
<<<<<<< HEAD
                    'view'         => 'Visualizza',
=======
                    'view'         => 'Vista',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                ],
            ],

            'create' => [
                'name'       => 'Nome',
<<<<<<< HEAD
                'save-btn'   => 'Salva tema',
=======
                'save-btn'   => 'Salva Tema',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'sort-order' => 'Ordinamento',
                'title'      => 'Crea Tema',

                'type' => [
<<<<<<< HEAD
                    'category-carousel' => 'Carosello delle Categorie',
                    'footer-links'      => 'Link del Piè di Pagina',
                    'image-carousel'    => 'Carosello delle Immagini',
                    'product-carousel'  => 'Carosello dei Prodotti',
                    'static-content'    => 'Contenuto Statico',
=======
                    'category-carousel' => 'Carosello Categoria',
                    'footer-links'      => 'Link Piè di Pagina',
                    'image-carousel'    => 'Carosello Immagini',
                    'product-carousel'  => 'Carosello Prodotti',
                    'static-content'    => 'Contenuto Statico',
                    'services-content'  => 'Contenuto Servizi',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'title'             => 'Tipo',
                ],
            ],

            'edit' => [
                'add-image-btn'                 => 'Aggiungi Immagine',
                'add-filter-btn'                => 'Aggiungi Filtro',
<<<<<<< HEAD
                'add-footer-link-btn'           => 'Aggiungi Link del Piè di Pagina',
                'add-link'                      => 'Aggiungi Link',
                'asc'                           => 'crescente',
                'back'                          => 'Indietro',
                'category-carousel-description' => 'Mostra le categorie in modo accattivante utilizzando un carosello delle categorie reattivo.',
                'category-carousel'             => 'Carosello delle Categorie',
=======
                'add-footer-link-btn'           => 'Aggiungi Link Piè di Pagina',
                'add-link'                      => 'Aggiungi Link',
                'asc'                           => 'Asc',
                'back'                          => 'Indietro',
                'category-carousel-description' => 'Visualizza le categorie dinamiche in modo accattivante utilizzando un carosello di categorie responsivo.',
                'category-carousel'             => 'Carosello Categoria',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'create-filter'                 => 'Crea Filtro',
                'css'                           => 'CSS',
                'column'                        => 'Colonna',
                'channels'                      => 'Canali',
<<<<<<< HEAD
                'desc'                          => 'decrescente',
                'delete'                        => 'Elimina',
                'edit'                          => 'Modifica',
                'footer-title'                  => 'Titolo',
                'footer-link'                   => 'Link del Piè di Pagina',
                'footer-link-form-title'        => 'Link del Piè di Pagina',
                'filter-title'                  => 'Titolo',
                'filters'                       => 'Filtri',
                'footer-link-description'       => 'Naviga tramite i link del piè di pagina per una navigazione senza soluzione di continuità nel sito web e per ottenere informazioni.',
=======
                'desc'                          => 'Desc',
                'delete'                        => 'Elimina',
                'edit'                          => 'Modifica',
                'footer-title'                  => 'Titolo',
                'footer-link'                   => 'Link Piè di Pagina',
                'footer-link-form-title'        => 'Link Piè di Pagina',
                'filter-title'                  => 'Titolo',
                'filters'                       => 'Filtri',
                'footer-link-description'       => 'Naviga attraverso i link nel piè di pagina per una navigazione e informazioni sul sito senza interruzioni.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'general'                       => 'Generale',
                'html'                          => 'HTML',
                'image-size'                    => 'La risoluzione dell\'immagine dovrebbe essere (1920px X 700px)',
                'image-upload-message'          => 'Sono consentite solo immagini (.jpeg, .jpg, .png, .webp, ..).',
                'image'                         => 'Immagine',
                'key'                           => 'Chiave: :key',
                'key-input'                     => 'Chiave',
                'link'                          => 'Link',
                'limit'                         => 'Limite',
                'name'                          => 'Nome',
<<<<<<< HEAD
                'product-carousel'              => 'Carosello dei Prodotti',
                'product-carousel-description'  => 'Mostra i prodotti in modo elegante con un carosello dei prodotti dinamico e reattivo.',
                'path'                          => 'Percorso',
=======
                'product-carousel'              => 'Carosello Prodotti',
                'product-carousel-description'  => 'Mostra i prodotti in modo elegante con un carosello di prodotti dinamico e responsivo.',
                'url'                           => 'URL',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'preview'                       => 'Anteprima',
                'slider'                        => 'Slider',
                'static-content-description'    => 'Aumenta l\'interazione con contenuti statici concisi e informativi per il tuo pubblico.',
                'static-content'                => 'Contenuto Statico',
<<<<<<< HEAD
                'slider-description'            => 'Personalizzazione del tema correlata allo slider.',
                'slider-required'               => 'Il campo Slider è obbligatorio.',
=======
                'slider-description'            => 'Personalizzazione del tema relativa allo slider.',
                'slider-required'               => 'Il campo slider è obbligatorio.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'slider-add-btn'                => 'Aggiungi Slider',
                'save-btn'                      => 'Salva',
                'sort'                          => 'Ordina',
                'sort-order'                    => 'Ordinamento',
                'status'                        => 'Stato',
                'slider-image'                  => 'Immagine Slider',
                'select'                        => 'Seleziona',
                'title'                         => 'Modifica Tema',
                'update-slider'                 => 'Aggiorna Slider',
                'value-input'                   => 'Valore',
                'value'                         => 'Valore: :value',
<<<<<<< HEAD
=======
                'image-title'                   => 'Titolo Immagine',
                'services-content'              => [
                    'add-btn'            => 'Aggiungi Servizio',
                    'channels'           => 'Canali',
                    'description'        => 'Descrizione',
                    'delete'             => 'Elimina',
                    'general'            => 'Generale',
                    'name'               => 'Nome',
                    'sort-order'         => 'Ordinamento',
                    'status'             => 'Stato',
                    'services'           => 'Servizi',
                    'service-info'       => 'Personalizzazione del tema relativa ai servizi.',
                    'save-btn'           => 'Salva',
                    'service-icon-class' => 'Classe Icona Servizio',
                    'service-icon'       => 'Icona Servizio',
                    'title'              => 'Titolo',
                    'update-service'     => 'Aggiorna Servizi',
                ],
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ],

            'create-success' => 'Tema creato con successo',
            'delete-success' => 'Tema eliminato con successo',
            'update-success' => 'Tema aggiornato con successo',
        ],
    ],

    'reporting' => [
        'sales' => [
            'index' => [
                'abandoned-carts'               => 'Carrelli Abbandonati',
                'abandoned-products'            => 'Prodotti Abbandonati',
                'abandoned-rate'                => 'Tasso di Abbandono',
<<<<<<< HEAD
                'abandoned-revenue'             => 'Ricavi Abbandonati',
                'average-order-value-over-time' => 'Valore Medio Ordine nel Tempo',
=======
                'abandoned-revenue'             => 'Ricavo Abbandonato',
                'average-order-value-over-time' => 'Valore Medio Ordine Nel Tempo',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'average-sales'                 => 'Valore Medio Ordine',
                'added-to-cart'                 => 'Aggiunto al Carrello',
                'added-to-cart-info'            => 'Solo :progress visitatori hanno aggiunto prodotti al carrello',
                'count'                         => 'Conteggio',
                'end-date'                      => 'Data di Fine',
<<<<<<< HEAD
                'id'                            => 'ID',
                'interval'                      => 'Intervallo',
                'name'                          => 'Nome',
                'orders'                        => 'Ordini',
                'orders-over-time'              => 'Ordini nel Tempo',
                'purchased'                     => 'Acquistato',
                'purchased-info'                => 'Solo :progress visitatori effettuano acquisti',
                'payment-method'                => 'Metodo di Pagamento',
                'product-views'                 => 'Visualizzazioni Prodotto',
                'product-views-info'            => 'Solo :progress visitatori visualizzano i prodotti',
                'purchase-funnel'               => 'Tunnel di Acquisto',
                'refunds'                       => 'Rimborsi',
                'refunds-over-time'             => 'Rimborsi nel Tempo',
                'sales-over-time'               => 'Vendite nel Tempo',
                'start-date'                    => 'Data di Inizio',
                'shipping-collected'            => 'Spedizioni Raccolte',
                'shipping-collected-over-time'  => 'Spedizioni Raccolte nel Tempo',
                'tax-collected'                 => 'Tasse Raccolte',
                'tax-collected-over-time'       => 'Tasse Raccolte nel Tempo',
                'title'                         => 'Vendite',
                'top-payment-methods'           => 'Metodi di Pagamento Principali',
                'top-shipping-methods'          => 'Metodi di Spedizione Principali',
                'top-tax-categories'            => 'Categorie Fiscali Principali',
=======
                'id'                            => 'Id',
                'interval'                      => 'Intervallo',
                'name'                          => 'Nome',
                'orders'                        => 'Ordini',
                'orders-over-time'              => 'Ordini Nel Tempo',
                'purchased'                     => 'Acquistati',
                'purchased-info'                => 'Solo :progress visitatori hanno effettuato acquisti',
                'payment-method'                => 'Metodo di Pagamento',
                'product-views'                 => 'Visualizzazioni Prodotto',
                'product-views-info'            => 'Solo :progress visitatori hanno visualizzato i prodotti',
                'purchase-funnel'               => 'Tunnel di Acquisto',
                'refunds'                       => 'Rimborsi',
                'refunds-over-time'             => 'Rimborsi Nel Tempo',
                'sales-over-time'               => 'Vendite Nel Tempo',
                'start-date'                    => 'Data di Inizio',
                'shipping-collected'            => 'Spedizione Riscossa',
                'shipping-collected-over-time'  => 'Spedizione Riscossa Nel Tempo',
                'tax-collected'                 => 'Tasse Riscosse',
                'tax-collected-over-time'       => 'Tasse Riscosse Nel Tempo',
                'title'                         => 'Vendite',
                'top-payment-methods'           => 'Principali Metodi di Pagamento',
                'top-shipping-methods'          => 'Principali Metodi di Spedizione',
                'top-tax-categories'            => 'Principali Categorie Fiscali',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'total'                         => 'Totale',
                'total-orders'                  => 'Totale Ordini',
                'total-sales'                   => 'Totale Vendite',
                'total-visits'                  => 'Totale visite',
<<<<<<< HEAD
                'total-visits-info'             => 'Totale visitatori sul negozio',
=======
                'total-visits-info'             => 'Totale visitatori sullo store',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'view-details'                  => 'Visualizza Dettagli',
            ],
        ],

        'customers' => [
            'index' => [
                'count'                       => 'Conteggio',
                'customers'                   => 'Clienti',
<<<<<<< HEAD
                'customers-over-time'         => 'Clienti nel Tempo',
                'customers-traffic'           => 'Traffico dei Clienti',
                'customers-with-most-orders'  => 'Clienti con il Maggior Numero di Ordini',
                'customers-with-most-reviews' => 'Clienti con il Maggior Numero di Recensioni',
                'customers-with-most-sales'   => 'Clienti con il Maggior Numero di Vendite',
                'email'                       => 'Email',
                'end-date'                    => 'Data di Fine',
                'id'                          => 'ID',
=======
                'customers-over-time'         => 'Clienti Nel Tempo',
                'customers-traffic'           => 'Traffico Clienti',
                'customers-with-most-orders'  => 'Clienti Con Più Ordini',
                'customers-with-most-reviews' => 'Clienti Con Più Recensioni',
                'customers-with-most-sales'   => 'Clienti Con Più Vendite',
                'email'                       => 'Email',
                'end-date'                    => 'Data di Fine',
                'id'                          => 'Id',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'interval'                    => 'Intervallo',
                'name'                        => 'Nome',
                'orders'                      => 'Ordini',
                'reviews'                     => 'Recensioni',
                'start-date'                  => 'Data di Inizio',
                'title'                       => 'Clienti',
<<<<<<< HEAD
                'top-customer-groups'         => 'Gruppi di Clienti Principali',
                'total'                       => 'Totale',
                'total-customers'             => 'Totale Clienti',
                'total-visitors'              => 'Totale Visitatori',
                'traffic-over-week'           => 'Traffico nella Settimana',
=======
                'top-customer-groups'         => 'Principali Gruppi di Clienti',
                'total'                       => 'Totale',
                'total-customers'             => 'Totale Clienti',
                'total-visitors'              => 'Totale Visitatori',
                'traffic-over-week'           => 'Traffico Settimanale',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'unique-visitors'             => 'Visitatori Unici',
                'view-details'                => 'Visualizza Dettagli',
            ],
        ],

        'products' => [
            'index' => [
<<<<<<< HEAD
                'end-date'                         => 'Data di Fine',
                'id'                               => 'ID',
                'interval'                         => 'Intervallo',
                'name'                             => 'Nome',
                'orders'                           => 'Ordini',
                'price'                            => 'Prezzo',
                'products-added-over-time'         => 'Prodotti Aggiunti nel Tempo',
                'products-with-most-reviews'       => 'Prodotti con il Maggior Numero di Recensioni',
                'products-with-most-visits'        => 'Prodotti con il Maggior Numero di Visite',
                'quantities'                       => 'Quantità',
                'quantities-sold-over-time'        => 'Quantità Vendute nel Tempo',
                'revenue'                          => 'Ricavi',
                'reviews'                          => 'Recensioni',
                'start-date'                       => 'Data di Inizio',
                'title'                            => 'Prodotti',
                'top-selling-products-by-quantity' => 'Prodotti più Venduti per Quantità',
                'top-selling-products-by-revenue'  => 'Prodotti più Venduti per Ricavi',
                'total'                            => 'Totale',
                'total-products-added-to-wishlist' => 'Prodotti Aggiunti alla Lista dei Desideri in Totale',
                'total-sold-quantities'            => 'Quantità Totale di Prodotti Venduti',
=======
                'channel'                          => 'Canale',
                'end-date'                         => 'Data di Fine',
                'id'                               => 'Id',
                'interval'                         => 'Intervallo',
                'last-search-terms'                => 'Ultimi Termini di Ricerca',
                'locale'                           => 'Località',
                'name'                             => 'Nome',
                'orders'                           => 'Ordini',
                'price'                            => 'Prezzo',
                'products-added-over-time'         => 'Prodotti Aggiunti Nel Tempo',
                'products-with-most-reviews'       => 'Prodotti Con Più Recensioni',
                'products-with-most-visits'        => 'Prodotti Con Più Visite',
                'quantities-sold-over-time'        => 'Quantità Vendute Nel Tempo',
                'quantities'                       => 'Quantità',
                'results'                          => 'Risultati',
                'revenue'                          => 'Ricavo',
                'reviews'                          => 'Recensioni',
                'search-term'                      => 'Termine di Ricerca',
                'start-date'                       => 'Data di Inizio',
                'title'                            => 'Prodotti',
                'top-search-terms'                 => 'Principali Termini di Ricerca',
                'top-selling-products-by-quantity' => 'Prodotti Più Venduti per Quantità',
                'top-selling-products-by-revenue'  => 'Prodotti Più Venduti per Ricavo',
                'total-products-added-to-wishlist' => 'Totale Prodotti Aggiunti alla Lista dei Desideri',
                'total-sold-quantities'            => 'Totale Quantità Vendute',
                'total'                            => 'Totale',
                'uses'                             => 'Usi',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'view-details'                     => 'Visualizza Dettagli',
                'visits'                           => 'Visite',
            ],
        ],

        'view' => [
<<<<<<< HEAD
            'day'        => 'Giorno',
            'end-date'   => 'Data di Fine',
            'export-csv' => 'Esporta in CSV',
            'export-xls' => 'Esporta in XLS',
            'month'      => 'Mese',
            'start-date' => 'Data di Inizio',
            'year'       => 'Anno',
        ],
        'empty' => [
            'info'  => 'Nessun dato disponibile per l\'intervallo selezionato',
            'title' => 'Nessun dato disponibile',
=======
            'day'           => 'Giorno',
            'end-date'      => 'Data di Fine',
            'export-csv'    => 'Esporta CSV',
            'export-xls'    => 'Esporta XLS',
            'month'         => 'Mese',
            'not-available' => 'Nessun Record Disponibile.',
            'start-date'    => 'Data di Inizio',
            'year'          => 'Anno',
        ],

        'empty' => [
            'info'  => 'Nessun dato disponibile per l\'intervallo selezionato',
            'title' => 'Nessun Dato Disponibile',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ],
    ],

    'configuration' => [
        'index' => [
<<<<<<< HEAD
=======
            'back-btn'                     => 'Indietro',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            'delete'                       => 'Elimina',
            'enable-at-least-one-shipping' => 'Abilita almeno un metodo di spedizione.',
            'enable-at-least-one-payment'  => 'Abilita almeno un metodo di pagamento.',
            'save-btn'                     => 'Salva Configurazione',
            'save-message'                 => 'Configurazione salvata con successo',
            'title'                        => 'Configurazione',

            'general' => [
                'info'  => 'Imposta le opzioni delle unità.',
                'title' => 'Generale',

<<<<<<< HEAD
                'general' => [
                    'info'  => 'Imposta le opzioni delle unità.',
                    'title' => 'Generale',

                    'unit-options' => [
                        'info'        => 'Imposta le opzioni delle unità.',
                        'title'       => 'Opzioni Unità',
                        'title-info'  => 'Dimensioni, colore, materiale, personalizzazione, miglioramento della soddisfazione del cliente e personalizzazione degli acquisti.',
                        'weight-unit' => 'Unità di Peso',
                    ],
                ],

                'content' => [
                    'info'  => 'Imposta le opzioni di confronto, le opzioni della lista dei desideri, le opzioni di ricerca delle immagini, il piè di pagina, il piè di pagina attivo e gli script personalizzati.',
                    'title' => 'Contenuto',

                    'settings' => [
                        'compare-options'     => 'Opzioni di Confronto',
                        'image-search-option' => 'Opzione di Ricerca Immagine',
                        'title'               => 'Impostazioni',
                        'title-info'          => 'Le impostazioni si riferiscono a scelte configurabili che controllano il comportamento di un sistema, di un\'applicazione o di un dispositivo, adattate alle preferenze e ai requisiti dell\'utente.',
                        'wishlist-options'    => 'Opzioni della Lista dei Desideri',
                    ],

                    'custom-scripts' => [
                        'custom-css'        => 'CSS Personalizzato',
                        'custom-javascript' => 'Javascript Personalizzato',
                        'title'             => 'Script Personalizzati',
                        'title-info'        => 'Gli script personalizzati sono porzioni di codice personalizzate create per aggiungere funzioni o caratteristiche specifiche al software, migliorandone unicità e capacità.',
=======
                'generale' => [
                    'info'  => 'Imposta le opzioni delle unità.',
                    'title' => 'Generale',

                    'opzioni-unita' => [
                        'info'          => 'Imposta le opzioni delle unità.',
                        'title'         => 'Opzioni dell\'unità',
                        'title-info'    => 'Dimensioni, colore, materiale, personalizzazione, miglioramento della soddisfazione del cliente e adattamento degli acquisti.',
                        'unita-peso'    => 'Unità di peso',
                    ],
                ],

                'contenuto' => [
                    'info'  => 'Imposta le opzioni di confronto, le opzioni della lista dei desideri, le opzioni di ricerca delle immagini, il piè di pagina, il piè di pagina e gli script personalizzati.',
                    'title' => 'Contenuto',

                    'impostazioni' => [
                        'opzioni-confronto'       => 'Opzioni di confronto',
                        'opzione-ricerca-immagini'=> 'Opzione di ricerca immagini',
                        'title'                   => 'Impostazioni',
                        'title-info'              => 'Le impostazioni si riferiscono a scelte configurabili che controllano il comportamento di un sistema, di un\'applicazione o di un dispositivo, personalizzate secondo le preferenze e le esigenze dell\'utente.',
                        'opzioni-lista-desideri'  => 'Opzioni della lista dei desideri',
                    ],

                    'script-personalizzati' => [
                        'css-personalizzato'        => 'CSS personalizzato',
                        'javascript-personalizzato' => 'Javascript personalizzato',
                        'title'                     => 'Script personalizzati',
                        'title-info'                => 'Gli script personalizzati sono pezzi di codice personalizzati creati per aggiungere funzioni o caratteristiche specifiche al software, migliorandone unicità.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    ],
                ],

                'design' => [
<<<<<<< HEAD
                    'info'  => 'Imposta il logo e l\'icona del favicon.',
                    'title' => 'Design',

                    'admin-logo' => [
                        'favicon'    => 'Favicon',
                        'logo-image' => 'Immagine del Logo',
                        'title'      => 'Logo dell\'Amministratore',
                        'title-info' => 'Il logo dell\'amministratore è l\'immagine o l\'emblema distintivo che rappresenta l\'interfaccia di amministrazione di un sistema o di un sito web, spesso personalizzabile.',
=======
                    'info'  => 'Imposta il logo e l\'icona favicon.',
                    'title' => 'Design',

                    'logo-admin' => [
                        'favicon'       => 'Favicon',
                        'immagine-logo' => 'Immagine del logo',
                        'title'         => 'Logo Admin',
                        'title-info'    => 'Il logo admin è l\'immagine o l\'emblema distintivo che rappresenta l\'interfaccia di amministrazione di un sistema o di un sito web, spesso personalizzabile.',
                    ],
                ],

                'magic-ai' => [
                    'info'  => 'Imposta le opzioni di Magic AI.',
                    'title' => 'Magic AI',

                    'settings' => [
                        'title'        => 'Impostazioni generali',
                        'title-info'   => 'Migliora la tua esperienza con la funzione Magic AI inserendo la tua esclusiva chiave API e indicando l\'organizzazione pertinente per un\'integrazione senza sforzi. Prendi il controllo delle tue credenziali OpenAI e personalizza le impostazioni secondo le tue esigenze specifiche.',
                        'enabled'      => 'Abilitato',
                        'api-key'      => 'Chiave API',
                        'organization' => 'Organizzazione',
                    ],

                    'content-generation' => [
                        'title'                            => 'Generazione di contenuti',
                        'title-info'                       => 'Questa funzione abiliterà Magic AI per ogni editor WYSIWYG, dove desideri gestire i contenuti usando l\'intelligenza artificiale.<br/><br/>Quando è abilitato, vai in qualsiasi editor per generare contenuti.',
                        'enabled'                          => 'Abilitato',
                        'product-short-description-prompt' => 'Prompt breve descrizione prodotto',
                        'product-description-prompt'       => 'Prompt descrizione prodotto',
                        'category-description-prompt'      => 'Prompt descrizione categoria',
                        'cms-page-content-prompt'          => 'Prompt contenuto pagina CMS',
                    ],

                    'image-generation' => [
                        'title'      => 'Generazione di immagini',
                        'title-info' => 'Questa funzione abiliterà Magic AI per ogni upload di immagini, dove desideri generare immagini usando DALL-E.<br/><br/>Quando è abilitato, vai in qualsiasi upload di immagini per generare un\'immagine.',
                        'enabled'    => 'Abilitato',
                    ],

                    'review-translation' => [
                        'title'      => 'Traduzione recensioni',
                        'title-info' => 'Fornisce all\'utente la possibilità di tradurre la recensione del cliente in inglese.<br/><br/>Quando abilitato, vai alla recensione e troverai il pulsante "Traduci in inglese" se la recensione è in una lingua diversa dall\'inglese.',
                        'enabled'    => 'Abilitato',
                    ],

                    'checkout-message' => [
                        'title'      => 'Messaggio di checkout personalizzato',
                        'title-info' => 'Crea un messaggio di checkout personalizzato per i clienti sulla pagina di ringraziamento, adattando il contenuto per risuonare con le preferenze individuali e migliorando l\'esperienza complessiva post-acquisto.',
                        'enabled'    => 'Abilitato',
                        'prompt'     => 'Prompt',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    ],
                ],
            ],

<<<<<<< HEAD
            'catalog' => [
                'info'  => 'Catalogo',
                'title' => 'Catalogo',

                'inventory' => [
                    'info'  => 'Imposta gli ordini in sospeso.',
                    'title' => 'Inventario',

                    'stock-options' => [
                        'allow-back-orders' => 'Consenti Ordini in Sospeso',
                        'title'             => 'Opzioni Stock',
                        'title-info'        => 'Le opzioni di stock sono contratti di investimento che concedono il diritto di acquistare o vendere azioni di una società a un prezzo predeterminato, influenzando i potenziali profitti.',
                    ],
                ],

                'products' => [
                    'info'  => 'Imposta il checkout per gli ospiti, la pagina di visualizzazione del prodotto, la pagina del carrello, il fronte del negozio, la recensione e la condivisione sociale dell\'attributo.',
                    'title' => 'Prodotti',

                    'guest-checkout' => [
                        'allow-guest-checkout'      => 'Consenti il Checkout per gli Ospiti',
                        'allow-guest-checkout-hint' => 'Suggerimento: se attivato, questa opzione può essere configurata per ciascun prodotto in modo specifico.',
                        'title'                     => 'Checkout per gli Ospiti',
                        'title-info'                => 'Il checkout per gli ospiti consente ai clienti di acquistare prodotti senza creare un account, semplificando il processo di acquisto per comodità e transazioni più veloci.',
                    ],

                    'product-view-page' => [
                        'allow-no-of-related-products'  => 'Numero Consentito di Prodotti Correlati',
                        'allow-no-of-up-sells-products' => 'Numero Consentito di Prodotti Upsell',
                        'title'                         => 'Configurazione della Pagina di Visualizzazione del Prodotto',
                        'title-info'                    => 'La configurazione della pagina di visualizzazione del prodotto implica l\'adattamento del layout ed degli elementi sulla pagina di visualizzazione di un prodotto, migliorando l\'esperienza dell\'utente e la presentazione delle informazioni.',
                    ],

                    'cart-view-page' => [
                        'allow-no-of-cross-sells-products' => 'Numero Consentito di Prodotti Cross-Sell',
                        'title'                            => 'Configurazione della Pagina del Carrello',
                        'title-info'                       => 'La configurazione della pagina del carrello comporta la disposizione degli articoli, dei dettagli e delle opzioni sulla pagina del carrello degli acquisti, migliorando l\'interazione dell\'utente e il flusso di acquisto.',
                    ],

                    'storefront' => [
                        'buy-now-button-display' => 'Consenti ai clienti di acquistare direttamente i prodotti',
                        'comma-separated'        => 'Separati da virgola',
                        'cheapest-first'         => 'Meno Costosi Prima',
                        'default-list-mode'      => 'Modalità di Elenco Predefinita',
                        'database'               => 'Database',
                        'expensive-first'        => 'Più Costosi Prima',
                        'elastic'                => 'Ricerca Elastic',
                        'from-z-a'               => 'Da Z a A',
                        'from-a-z'               => 'Da A a Z',
                        'grid'                   => 'Griglia',
                        'list'                   => 'Elenco',
                        'latest-first'           => 'Più Recenti Prima',
                        'oldest-first'           => 'Più Vecchi Prima',
                        'products-per-page'      => 'Prodotti per Pagina',
                        'sort-by'                => 'Ordina Per',
                        'search-mode'            => 'Modalità di Ricerca',
                        'title'                  => 'Vetrina',
                        'title-info'             => 'La vetrina è l\'interfaccia rivolta al cliente di un negozio online, che presenta prodotti, categorie e navigazione per un\'esperienza di acquisto senza soluzione di continuità.',
                    ],

                    'small-image' => [
                        'height'     => 'Altezza',
                        'title'      => 'Immagine Piccola',
                        'title-info' => 'L\'immagine piccola rappresenta una foto di dimensioni moderate che offre un equilibrio tra dettaglio e spazio sullo schermo, comunemente utilizzata per le immagini.',
                        'width'      => 'Larghezza',
                    ],

                    'medium-image' => [
                        'height'     => 'Altezza',
                        'title'      => 'Immagine Media',
                        'title-info' => 'L\'immagine media rappresenta una foto di dimensioni moderate che offre un equilibrio tra dettaglio e spazio sullo schermo, comunemente utilizzata per le immagini.',
                        'width'      => 'Larghezza',
                    ],

                    'large-image' => [
                        'width'      => 'Larghezza',
                        'height'     => 'Altezza',
                        'title'      => 'Immagine Grande',
                        'title-info' => 'L\'immagine grande rappresenta una foto ad alta risoluzione che fornisce dettagli e impatto visivo migliori, spesso utilizzata per la presentazione di prodotti o grafiche.',
                    ],

                    'review' => [
                        'allow-guest-review' => 'Consenti Recensioni degli Ospiti',
                        'title'              => 'Recensione',
                        'title-info'         => 'Valutazione o valutazione di qualcosa, spesso coinvolgendo opinioni e feedback.',
                    ],

                    'attribute' => [
                        'file-upload-size'  => 'Dimensione Consentita per il Caricamento di File (in Kb)',
                        'image-upload-size' => 'Dimensione Consentita per il Caricamento di Immagini (in Kb)',
                        'title'             => 'Attributo',
                        'title-info'        => 'Caratteristica o proprietà che definisce un oggetto, influenzandone il comportamento, l\'aspetto o la funzione.',
                    ],

                    'social-share' => [
                        'enable-social-share'    => 'Abilita Condivisione Sociale?',
                        'enable-share-facebook'  => 'Abilita Condivisione su Facebook?',
                        'enable-share-twitter'   => 'Abilita Condivisione su Twitter?',
                        'enable-share-pinterest' => 'Abilita Condivisione su Pinterest?',
                        'enable-share-whatsapp'  => 'Abilita Condivisione su WhatsApp?',
                        'enable-share-linkedin'  => 'Abilita Condivisione su LinkedIn?',
                        'enable-share-email'     => 'Abilita Condivisione tramite Email?',
                        'share-message'          => 'Messaggio di Condivisione',
                        'share'                  => 'Condividi',
                        'title'                  => 'Condivisione Sociale',
                        'title-info'             => 'Condivisione di contenuti da un sito web con gli amici su piattaforme di social media come Facebook, Twitter o Instagram.',
                    ],
                ],

                'rich-snippets' => [
                    'info'  => 'Imposta prodotti e categorie.',
                    'title' => 'Snippet Ricchi',

                    'products' => [
                        'enable'          => 'Abilita',
                        'show-weight'     => 'Mostra Peso',
                        'show-categories' => 'Mostra Categorie',
                        'show-images'     => 'Mostra Immagini',
                        'show-reviews'    => 'Mostra Recensioni',
                        'show-ratings'    => 'Mostra Valutazioni',
                        'show-offers'     => 'Mostra Offerte',
                        'show-sku'        => 'Mostra SKU',
                        'title'           => 'Prodotti',
                        'title-info'      => 'Prodotti disponibili per l\'acquisto o l\'uso, offerti da un\'azienda o da un venditore.',
                    ],

                    'categories' => [
                        'enable'                  => 'Abilita',
                        'show-search-input-field' => 'Mostra Campo di Inserimento Ricerca',
                        'title'                   => 'Categorie',
                        'title-info'              => '"Categorie" si riferiscono a gruppi o classificazioni che aiutano a organizzare e raggruppare prodotti o articoli simili per una navigazione e ricerca più semplice.',
=======
            'catalogo' => [
                'info'  => 'Catalogo',
                'title' => 'Catalogo',

                'inventario' => [
                    'info'  => 'Imposta i back order',
                    'title' => 'Inventario',

                    'opzioni-stock' => [
                        'allow-back-orders'  => 'Consenti Back orders',
                        'title'              => 'Opzioni di stock',
                        'title-info'         => 'Le opzioni di stock sono contratti di investimento che concedono il diritto di acquistare o vendere azioni di un\'azienda a un prezzo predeterminato, influenzando i potenziali profitti.',
                    ],
                ],

                'prodotti' => [
                    'info'  => 'Imposta il checkout per gli ospiti, la pagina di visualizzazione del prodotto, la pagina del carrello, il fronte del negozio, la recensione e la condivisione sociale degli attributi.',
                    'title' => 'Prodotti',

                    'checkout-ospiti' => [
                        'allow-guest-checkout'      => 'Consenti Checkout per gli Ospiti',
                        'allow-guest-checkout-hint' => 'Suggerimento: se attivato, questa opzione può essere configurata per ciascun prodotto in modo specifico.',
                        'title'                     => 'Checkout per gli Ospiti',
                        'title-info'                => 'Il checkout per gli ospiti consente ai clienti di acquistare prodotti senza creare un account, semplificando il processo di acquisto per la comodità e transazioni più veloci.',
                    ],

                    'pagina-visualizzazione-prodotto' => [
                        'allow-no-of-related-products'  => 'Numero consentito di prodotti correlati',
                        'allow-no-of-up-sells-products' => 'Numero consentito di prodotti Up-Sell',
                        'title'                         => 'Configurazione della pagina di visualizzazione del prodotto',
                        'title-info'                    => 'La configurazione della pagina di visualizzazione del prodotto comporta l\'adattamento del layout e degli elementi sulla pagina di visualizzazione di un prodotto, migliorando l\'esperienza utente e la presentazione delle informazioni.',
                    ],

                    'pagina-carrello' => [
                        'allow-no-of-cross-sells-products' => 'Numero consentito di prodotti Cross-Sell',
                        'title'                            => 'Configurazione della pagina del carrello',
                        'title-info'                       => 'La configurazione della pagina del carrello comporta la disposizione degli articoli, dei dettagli e delle opzioni sulla pagina del carrello, migliorando l\'interazione dell\'utente e il flusso di acquisto.',
                    ],

                    'storefront' => [
                        'display-pulsante-acquista-ora' => 'Consenti ai clienti di acquistare direttamente i prodotti',
                        'separati-da-virgola'           => 'Separati da virgola',
                        'piu-economico-prima'           => 'Più economico prima',
                        'modalita-lista-predefinita'    => 'Modalità lista predefinita',
                        'database'                      => 'Database',
                        'piu-costoso-prima'             => 'Più costoso prima',
                        'elastico'                      => 'Ricerca elastica',
                        'da-z-a'                        => 'Da Z-A',
                        'da-a-z'                        => 'Da A-Z',
                        'griglia'                       => 'Griglia',
                        'lista'                         => 'Lista',
                        'piu-recenti-prima'             => 'I più recenti prima',
                        'piu-vecchi-prima'              => 'I più vecchi prima',
                        'prodotti-per-pagina'           => 'Prodotti per pagina',
                        'ordinato-per'                  => 'Ordinato per',
                        'modalita-ricerca'              => 'Modalità di ricerca',
                        'title'                         => 'Vetrina',
                        'title-info'                    => 'La vetrina è l\'interfaccia rivolta ai clienti di un negozio online, che mostra prodotti, categorie e navigazione per un\'esperienza di acquisto senza soluzione di continuità.',
                    ],

                    'immagine-piccola' => [
                        'altezza'        => 'Altezza',
                        'title'          => 'Immagine piccola',
                        'title-info'     => 'La vetrina è l\'interfaccia rivolta ai clienti di un negozio online, che mostra prodotti, categorie e navigazione per un\'esperienza di acquisto senza soluzione di continuità.',
                        'larghezza'      => 'Larghezza',
                    ],

                    'immagine-media' => [
                        'altezza'        => 'Altezza',
                        'title'          => 'Immagine media',
                        'title-info'     => 'L\'immagine media si riferisce a un\'immagine di dimensioni moderate che offre un equilibrio tra dettaglio e spazio dello schermo, comunemente utilizzata per le visualizzazioni.',
                        'larghezza'      => 'Larghezza',
                    ],

                    'immagine-grande' => [
                        'larghezza'      => 'Larghezza',
                        'altezza'        => 'Altezza',
                        'title'          => 'Immagine grande',
                        'title-info'     => 'L\'immagine grande rappresenta un\'immagine ad alta risoluzione che fornisce dettagli e impatto visivo migliorati, spesso utilizzata per mostrare prodotti o grafiche.',
                    ],

                    'recensione' => [
                        'allow-guest-review' => 'Consenti recensioni degli ospiti',
                        'title'              => 'Recensione',
                        'title-info'         => 'Valutazione o valutazione di qualcosa, spesso coinvolgente opinioni e feedback.',
                    ],

                    'attributo' => [
                        'dimensione-upload-file'     => 'Dimensione consentita per il caricamento del file (in Kb)',
                        'dimensione-upload-immagine' => 'Dimensione consentita per il caricamento dell\'immagine (in Kb)',
                        'title'                      => 'Attributo',
                        'title-info'                 => 'Caratteristica o proprietà che definisce un oggetto, influenzandone il comportamento, l\'aspetto o la funzione.',
                    ],

                    'condivisione-sociale' => [
                        'abilita-condivisione-sociale'    => 'Abilita la condivisione sociale?',
                        'abilita-condivisione-facebook'   => 'Abilita la condivisione su Facebook?',
                        'abilita-condivisione-twitter'    => 'Abilita la condivisione su Twitter?',
                        'abilita-condivisione-pinterest'  => 'Abilita la condivisione su Pinterest?',
                        'abilita-condivisione-whatsapp'   => 'Abilita la condivisione su WhatsApp?',
                        'abilita-condivisione-linkedin'   => 'Abilita la condivisione su Linkedin?',
                        'abilita-condivisione-email'      => 'Abilita la condivisione via email?',
                        'messaggio-condivisione'          => 'Messaggio di condivisione',
                        'condividi'                       => 'Condividi',
                        'title'                           => 'Condivisione sociale',
                        'title-info'                      => 'Condivisione di cose da un sito web con amici su piattaforme di social media come Facebook, Twitter o Instagram.',
                    ],
                ],

                'snippet-ricchi' => [
                    'info'  => 'Imposta prodotti e categorie.',
                    'title' => 'Snippet Ricchi',

                    'prodotti' => [
                        'abilita'               => 'Abilita',
                        'mostra-peso'           => 'Mostra Peso',
                        'mostra-categorie'      => 'Mostra Categorie',
                        'mostra-immagini'       => 'Mostra Immagini',
                        'mostra-recensioni'     => 'Mostra Recensioni',
                        'mostra-valutazioni'    => 'Mostra Valutazioni',
                        'mostra-offerte'        => 'Mostra Offerte',
                        'mostra-sku'            => 'Mostra SKU',
                        'title'                 => 'Prodotti',
                        'title-info'            => 'Articoli disponibili per l\'acquisto o l\'uso, offerti da un\'azienda o un venditore.',
                    ],

                    'categorie' => [
                        'abilita'                    => 'Abilita',
                        'mostra-campo-input-ricerca' => 'Mostra campo di input di ricerca',
                        'title'                      => 'Categorie',
                        'title-info'                 => 'Le "Categorie" si riferiscono a gruppi o classificazioni che aiutano a organizzare e raggruppare prodotti o articoli simili per una navigazione e consultazione più semplice.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    ],
                ],
            ],

            'customer' => [
                'info'  => 'Cliente',
                'title' => 'Cliente',

                'address' => [
<<<<<<< HEAD
                    'info'  => 'Imposta paese, stato, codice postale e linee in un indirizzo stradale.',
=======
                    'info'  => 'Imposta paese, stato, CAP e linee in un indirizzo.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'title' => 'Indirizzo',

                    'requirements' => [
                        'country'    => 'Paese',
                        'city'       => 'Città',
                        'state'      => 'Stato',
                        'title'      => 'Requisiti',
<<<<<<< HEAD
                        'title-info' => 'I requisiti sono le condizioni, le caratteristiche o le specifiche necessarie affinché qualcosa sia soddisfatto, realizzato o completato con successo.',
                        'zip'        => 'Codice Postale',
                    ],

                    'information' => [
                        'street-lines' => 'Linee in un Indirizzo Stradale',
                        'title'        => 'Informazioni',
                        'title-info'   => '"Linee in un indirizzo stradale" si riferiscono a segmenti individuali di un indirizzo, spesso separati da virgole, che forniscono informazioni sulla posizione come numero civico, strada, città e altro.',
                    ],
                ],

                'captcha' => [
=======
                        'title-info' => 'I requisiti sono le condizioni, le caratteristiche o le specifiche necessarie perché qualcosa sia soddisfatto, raggiunto o realizzato con successo.',
                        'zip'        => 'CAP',
                    ],

                    'information' => [
                        'street-lines' => 'Linee in un Indirizzo',
                        'title'        => 'Informazioni',
                        'title-info'   => '"Linee in un indirizzo" si riferiscono ai segmenti individuali di un indirizzo, spesso separati da virgole, fornendo informazioni sulla posizione come numero civico, strada, città e altro.',
                    ],
                ],

                'captcha'  => [
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'info'  => 'Imposta chiave del sito, chiave segreta e stato.',
                    'title' => 'Captcha',

                    'credentials' => [
                        'site-key'   => 'Chiave del Sito',
                        'secret-key' => 'Chiave Segreta',
                        'status'     => 'Stato',
                        'title'      => 'Credenziali',
<<<<<<< HEAD
                        'title-info' => '"Sitemap: Mappa del layout del sito web per i motori di ricerca. Chiave segreta: Codice di sicurezza per la crittografia dei dati, l\'autenticazione o la protezione dell\'accesso alle API."',
                    ],

                    'validations' => [
                        'captcha'  => 'Qualcosa è andato storto! Per favore riprova.',
                        'required' => 'Seleziona il CAPTCHA, per favore.',
=======
                        'title-info' => '"Mappa del sito: Mappa del layout del sito web per i motori di ricerca. Chiave segreta: Codice sicuro per la crittografia dei dati, l\'autenticazione o la protezione dell\'accesso API."',
                    ],

                    'validations' => [
                        'captcha'  => 'Qualcosa è andato storto! Per favore, riprova.',
                        'required' => 'Seleziona per favore il CAPTCHA',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    ],
                ],

                'settings' => [
<<<<<<< HEAD
                    'settings-info' => 'Imposta iscrizioni alla newsletter, verifiche via email e accesso sociale.',
                    'title'         => 'Impostazioni',

                    'newsletter' => [
                        'subscription' => 'Permetti Iscrizione alla Newsletter',
                        'title'        => 'Iscrizione alla Newsletter',
                        'title-info'   => '"Informazioni sulla newsletter" contengono aggiornamenti, offerte o contenuti condivisi regolarmente tramite e-mail ai sottoscrittori, tenendoli informati e coinvolti.',
                    ],

                    'email' => [
                        'email-verification' => 'Abilita Verifica dell\'Email',
                        'title'              => 'Verifica dell\'Email',
                        'title-info'         => '"La verifica dell\'email" conferma l\'autenticità di un indirizzo email, spesso inviando un link di conferma, migliorando la sicurezza del tuo account e l\'affidabilità delle comunicazioni.',
=======
                    'settings-info' => 'Imposta iscrizioni alla newsletter, verifiche via email e login social.',
                    'title'         => 'Impostazioni',

                    'newsletter' => [
                        'subscription' => 'Consenti Iscrizione alla Newsletter',
                        'title'        => 'Iscrizione alla Newsletter',
                        'title-info'   => '"Informazioni sulla newsletter" contengono aggiornamenti, offerte o contenuti condivisi regolarmente tramite email agli iscritti, tenendoli informati e coinvolti.',
                    ],

                    'email' => [
                        'email-verification' => 'Consenti Verifica via Email',
                        'title'              => 'Verifica via Email',
                        'title-info'         => '"Verifica via email" conferma l\'autenticità di un indirizzo email, spesso inviando un link di conferma, migliorando la sicurezza dell\'account e la affidabilità della comunicazione.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    ],

                    'social-login' => [
                        'enable-facebook'   => 'Abilita Facebook',
                        'enable-twitter'    => 'Abilita Twitter',
                        'enable-google'     => 'Abilita Google',
                        'enable-linkedin'   => 'Abilita LinkedIn',
                        'enable-github'     => 'Abilita Github',
<<<<<<< HEAD
                        'social-login'      => 'Accesso tramite Social Media',
                        'social-login-info' => '"Accesso tramite social media" consente agli utenti di accedere ai siti web utilizzando i loro account dei social media, semplificando i processi di registrazione e accesso per maggiore comodità.',
=======
                        'social-login'      => 'Login Sociale',
                        'social-login-info' => '"Login sociale" consente agli utenti di accedere ai siti web utilizzando i loro account dei social media, semplificando i processi di registrazione e accesso per la comodità.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    ],
                ],
            ],

            'email' => [
                'info'  => 'Email',
                'title' => 'Email',

                'email-settings' => [
<<<<<<< HEAD
                    'admin-name'            => 'Nome Admin',
                    'admin-name-tip'        => 'Questo nome verrà visualizzato in tutte le email dell\'admin',
                    'admin-email'           => 'Email Admin',
                    'admin-email-tip'       => 'L\'indirizzo email dell\'admin per questo canale per ricevere email',
                    'admin-page-limit'      => 'Elementi Predefiniti Per Pagina (Admin)',
                    'email-sender-name'     => 'Nome Mittente Email',
                    'email-sender-name-tip' => 'Questo nome verrà visualizzato nella casella di posta dei clienti',
                    'info'                  => 'Imposta il nome del mittente dell\'email, l\'indirizzo email del negozio, il nome dell\'admin e l\'indirizzo email dell\'admin.',
                    'shop-email-from'       => 'Indirizzo Email del Negozio',
                    'shop-email-from-tip'   => 'L\'indirizzo email di questo canale per inviare email ai tuoi clienti',
                    'title'                 => 'Impostazioni Email',
=======
                    'admin-name'             => 'Nome Admin',
                    'admin-name-tip'         => 'Questo nome verrà visualizzato in tutte le email degli amministratori',
                    'admin-email'            => 'Email Admin',
                    'admin-email-tip'        => 'L\'indirizzo email dell\'amministratore di questo canale per ricevere le email',
                    'admin-page-limit'       => 'Elementi predefiniti per pagina (Admin)',
                    'email-sender-name'      => 'Nome Mittente Email',
                    'email-sender-name-tip'  => 'Questo nome verrà visualizzato nella casella di posta dei clienti',
                    'info'                   => 'Imposta il nome del mittente email, l\'indirizzo email del negozio, il nome dell\'amministratore e l\'indirizzo email dell\'amministratore.',
                    'shop-email-from'        => 'Indirizzo Email del Negozio',
                    'shop-email-from-tip'    => 'L\'indirizzo email di questo canale per inviare email ai tuoi clienti',
                    'title'                  => 'Impostazioni Email',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                ],

                'notifications' => [
                    'customer-registration-confirmation-mail-to-admin' => 'Invia una email di conferma all\'admin dopo la registrazione del cliente',
<<<<<<< HEAD
                    'customer'                                         => 'Invia le credenziali dell\'account del cliente dopo la registrazione',
                    'cancel-order'                                     => 'Invia una notifica dopo la cancellazione di un ordine',
                    'info'                                             => '"Notifica" è un messaggio o un avviso che informa gli utenti sugli eventi, gli aggiornamenti o le azioni, migliorando il coinvolgimento e la consapevolezza dell\'utente.',
                    'new-order'                                        => 'Invia una email di conferma al cliente dopo aver effettuato un nuovo ordine',
                    'new-admin'                                        => 'Invia una email di conferma all\'admin dopo aver effettuato un nuovo ordine',
                    'new-invoice'                                      => 'Invia una email di notifica al cliente dopo aver creato una nuova fattura',
                    'new-refund'                                       => 'Invia una email di notifica al cliente dopo aver effettuato un rimborso',
                    'new-shipment'                                     => 'Invia una email di notifica al cliente dopo aver creato una spedizione',
                    'new-inventory-source'                             => 'Invia una email di notifica all\'inventario dopo aver creato una spedizione',
=======
                    'customer'                                         => 'Invia le credenziali dell\'account cliente dopo la registrazione',
                    'cancel-order'                                     => 'Invia una notifica dopo l\'annullamento di un ordine',
                    'info'                                             => '"Notifica" è un messaggio o avviso che informa gli utenti su eventi, aggiornamenti o azioni, migliorando il coinvolgimento e la consapevolezza dell\'utente.',
                    'new-order'                                        => 'Invia una email di conferma al cliente dopo aver effettuato un nuovo ordine',
                    'new-admin'                                        => 'Invia una email di conferma all\'admin dopo aver effettuato un nuovo ordine',
                    'new-invoice'                                      => 'Invia una email di notifica al cliente dopo la creazione di una nuova fattura',
                    'new-refund'                                       => 'Invia una email di notifica al cliente dopo la creazione di un rimborso',
                    'new-shipment'                                     => 'Invia una email di notifica al cliente dopo la creazione di una spedizione',
                    'new-inventory-source'                             => 'Invia una email di notifica alla fonte di inventario dopo la creazione di una spedizione',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'registration'                                     => 'Invia una email di conferma dopo la registrazione del cliente',
                    'title'                                            => 'Notifiche',
                    'verification'                                     => 'Invia una email di verifica dopo la registrazione del cliente',
                ],
            ],

            'sales' => [
                'info'  => 'Vendite',
                'title' => 'Vendite',

                'shipping' => [
                    'info'  => 'Imposta le informazioni sulla spedizione.',
                    'title' => 'Spedizione',

                    'origin' => [
<<<<<<< HEAD
                        'bank-details'   => 'Dettagli Bancari',
=======
                        'bank-details'   => 'Dati Bancari',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        'contact-number' => 'Numero di Contatto',
                        'city'           => 'Città',
                        'country'        => 'Paese',
                        'state'          => 'Stato',
<<<<<<< HEAD
                        'street-address' => 'Indirizzo Stradale',
                        'store-name'     => 'Nome del Negozio',
                        'title'          => 'Origine',
                        'title-info'     => 'L\'origine della spedizione si riferisce al luogo in cui le merci o i prodotti hanno origine prima di essere trasportati alla loro destinazione.',
                        'vat-number'     => 'Partita IVA',
=======
                        'street-address' => 'Indirizzo',
                        'store-name'     => 'Nome del Negozio',
                        'title'          => 'Origine',
                        'title-info'     => "L'origine della spedizione si riferisce al luogo in cui le merci o i prodotti hanno origine prima di essere trasportati alla loro destinazione.",
                        'vat-number'     => 'Numero di Partita IVA',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        'zip'            => 'CAP',
                    ],
                ],

                'shipping-methods' => [
                    'info'  => 'Imposta le informazioni sui metodi di spedizione',
                    'title' => 'Metodi di Spedizione',

                    'free-shipping' => [
                        'description' => 'Descrizione',
                        'page-title'  => 'Spedizione Gratuita',
                        'status'      => 'Stato',
<<<<<<< HEAD
                        'title-info'  => '"Spedizione gratuita" si riferisce a un metodo di spedizione in cui il costo della spedizione viene annullato e il venditore copre le spese di spedizione per la consegna di merci all\'acquirente.',
                        'title'       => 'Titolo',
                        'type'        => 'Tipo',
=======
                        'title-info'  => '"Spedizione gratuita" si riferisce a un metodo di spedizione in cui il costo della spedizione è annullato e il venditore copre le spese di spedizione per consegnare la merce al compratore.',
                        'title'       => 'Titolo',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    ],

                    'flat-rate-shipping' => [
                        'description' => 'Descrizione',
                        'page-title'  => 'Spedizione a Tariffa Fissa',
                        'rate'        => 'Tariffa',
                        'status'      => 'Stato',
                        'title'       => 'Titolo',
<<<<<<< HEAD
                        'title-info'  => 'La spedizione a tariffa fissa è un metodo di spedizione in cui viene addebitata una tariffa fissa per la spedizione, indipendentemente dal peso, dal volume o dalla destinazione del pacco.',
=======
                        'title-info'  => 'La spedizione a tariffa fissa è un metodo di spedizione in cui viene addebitata una tariffa fissa per la spedizione, indipendentemente dal peso, dalle dimensioni o dalla distanza del pacchetto. Ciò semplifica i costi di spedizione e può essere vantaggioso sia per i compratori che per i venditori.',
                        'type'        => 'Tipo',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    ],
                ],

                'payment-methods' => [
<<<<<<< HEAD
                    'page-title'                  => 'Metodi di Pagamento',
                    'info'                        => 'Imposta informazioni sui metodi di pagamento',
                    'cash-on-delivery'            => 'Pagamento alla Consegna',
                    'cash-on-delivery-info'       => 'Metodo di pagamento in cui i clienti pagano in contanti al momento della consegna dei beni o dei servizi a domicilio.',
                    'description'                 => 'Descrizione',
                    'title'                       => 'Titolo',
                    'instructions'                => 'Istruzioni',
                    'generate-invoice'            => 'Genera automaticamente la fattura dopo aver effettuato un ordine',
                    'set-invoice-status'          => 'Imposta lo stato della fattura dopo la creazione della fattura a',
                    'generate-invoice-applicable' => 'Applicabile se la generazione automatica della fattura è abilitata',
                    'status'                      => 'Stato',
                    'sort-order'                  => 'Ordina per',
                    'set-order-status'            => 'Imposta lo stato dell\'ordine dopo la creazione della fattura a',
                    'pending'                     => 'In attesa',
                    'paid'                        => 'Pagato',
                    'sandbox'                     => 'Ambiente di Prova',
                    'pending-payment'             => 'Pagamento in Sospeso',
                    'processing'                  => 'In Elaborazione',
                    'money-transfer'              => 'Trasferimento di Denaro',
                    'money-transfer-info'         => 'Trasferimento di fondi da una persona o un conto all\'altro, spesso in modo elettronico, per vari scopi come transazioni o rimesse.',
                    'mailing-address'             => 'Invia il Controllo a',
                    'paypal-standard'             => 'PayPal Standard',
                    'paypal-standard-info'        => 'PayPal Standard è una semplice opzione di pagamento PayPal per le attività online, che consente ai clienti di pagare utilizzando i loro account PayPal o carte di credito/debito.',
                    'paypal-smart-button'         => 'PayPal',
                    'paypal-smart-button-info'    => 'Pulsante PayPal Smart: semplifica i pagamenti online con pulsanti personalizzabili per transazioni sicure e multi-metodo su siti web e app.',
                    'client-id'                   => 'ID Cliente',
                    'client-id-info'              => 'Usa "sb" per i test.',
                    'client-secret'               => 'Chiave Segreta del Cliente',
                    'client-secret-info'          => 'Aggiungi qui la tua chiave segreta',
                    'accepted-currencies'         => 'Valute Accettate',
                    'accepted-currencies-info'    => 'Aggiungi codici di valuta separati da virgola, ad esempio USD, EUR, ...',
                    'business-account'            => 'Account Aziendale',
                ],

                'order-settings' => [
                    'info'  => 'Imposta numeri d\'ordine e ordini minimi.',
                    'title' => 'Impostazioni d\'Ordine',

                    'order-number' => [
                        'generator'  => 'Generatore di Numero d\'Ordine',
                        'length'     => 'Lunghezza del Numero d\'Ordine',
                        'prefix'     => 'Prefisso del Numero d\'Ordine',
                        'suffix'     => 'Suffisso del Numero d\'Ordine',
                        'title'      => 'Impostazioni del Numero d\'Ordine',
                        'title-info' => 'Identificatore unico assegnato a un ordine specifico del cliente, che aiuta nel tracciamento, nella comunicazione e nel riferimento durante il processo d\'acquisto.',
=======
                    'accepted-currencies'            => 'Valute accettate',
                    'accepted-currencies-info'       => 'Aggiungi il codice della valuta separato da virgola, ad esempio USD, INR,...',
                    'business-account'               => 'Account aziendale',
                    'cash-on-delivery-info'          => 'Metodo di pagamento in cui i clienti pagano in contanti al momento della ricezione dei beni o servizi alla porta di casa.',
                    'cash-on-delivery'               => 'Pagamento alla consegna',
                    'client-id'                      => 'ID cliente',
                    'client-id-info'                 => 'Utilizzare "sb" per il testing.',
                    'client-secret'                  => 'Segreto cliente',
                    'client-secret-info'             => 'Aggiungi qui la tua chiave segreta',
                    'description'                    => 'Descrizione',
                    'generate-invoice-applicable'    => 'Applicabile se la generazione automatica della fattura è abilitata',
                    'generate-invoice'               => 'Genera automaticamente la fattura dopo aver effettuato un ordine',
                    'info'                           => 'Imposta le informazioni sui metodi di pagamento',
                    'instructions'                   => 'Istruzioni',
                    'logo-information'               => 'La risoluzione dell\'immagine dovrebbe essere di circa 55px x 45px',
                    'logo'                           => 'Logo',
                    'money-transfer'                 => 'Bonifico bancario',
                    'money-transfer-info'            => 'Trasferimento di fondi da una persona o un conto a un altro, spesso in modo elettronico, per vari scopi come transazioni o rimesse.',
                    'mailing-address'                => 'Invia il controllo a',
                    'pending'                        => 'In attesa',
                    'paid'                           => 'Pagato',
                    'processing'                     => 'In elaborazione',
                    'pending-payment'                => 'Pagamento in sospeso',
                    'page-title'                     => 'Metodi di pagamento',
                    'paypal-standard'                => 'PayPal Standard',
                    'paypal-standard-info'           => 'PayPal Standard è un\'opzione di pagamento di base per le attività online, che consente ai clienti di pagare utilizzando i loro account PayPal o carte di credito/debito.',
                    'paypal-smart-button'            => 'PayPal',
                    'paypal-smart-button-info'       => 'Pulsante intelligente PayPal: semplifica i pagamenti online con pulsanti personalizzabili per transazioni sicure e multi-metodo su siti web e app.',
                    'set-invoice-status'             => 'Imposta lo stato della fattura dopo la creazione della fattura a',
                    'status'                         => 'Stato',
                    'sort-order'                     => 'Ordine di classificazione',
                    'set-order-status'               => 'Imposta lo stato dell\'ordine dopo la creazione della fattura a',
                    'sandbox'                        => 'Area di test',
                    'title'                          => 'Titolo',
                ],

                'order-settings' => [
                    'info'  => 'Imposta i numeri d\'ordine e gli ordini minimi.',
                    'title' => 'Impostazioni degli Ordini',

                    'order-number' => [
                        'generator'   => 'Generatore di Numeri d\'Ordine',
                        'length'      => 'Lunghezza Numero d\'Ordine',
                        'prefix'      => 'Prefisso Numero d\'Ordine',
                        'suffix'      => 'Suffisso Numero d\'Ordine',
                        'title'       => 'Impostazioni Numero d\'Ordine',
                        'title-info'  => 'Identificativo unico assegnato a un ordine specifico del cliente, facilitando il monitoraggio, la comunicazione e il riferimento durante l\'intero processo di acquisto.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    ],

                    'minimum-order' => [
                        'minimum-order-amount' => 'Importo Minimo d\'Ordine',
<<<<<<< HEAD
                        'title'                => 'Impostazioni d\'Ordine Minimo',
                        'title-info'           => 'Criteri configurati che specificano la quantità o il valore minimo richiesto per l\'elaborazione di un ordine o per beneficiare di vantaggi.',
=======
                        'title'                => 'Impostazioni Ordine Minimo',
                        'title-info'           => 'Criteri configurati che specificano la quantità o il valore minimo richiesto per elaborare un ordine o per usufruire di vantaggi.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    ],
                ],

                'invoice-settings' => [
<<<<<<< HEAD
                    'info'  => 'Imposta numero della fattura, termini di pagamento, design della scheda della fattura e promemoria della fattura.',
                    'title' => 'Impostazioni della Fattura',

                    'invoice-number' => [
                        'generator'  => 'Generatore di Numero della Fattura',
                        'length'     => 'Lunghezza del Numero della Fattura',
                        'prefix'     => 'Prefisso del Numero della Fattura',
                        'suffix'     => 'Suffisso del Numero della Fattura',
                        'title'      => 'Impostazioni del Numero della Fattura',
                        'title-info' => 'Configurazione di regole o parametri per la generazione e l\'assegnazione di numeri di identificazione unici alle fatture per scopi organizzativi e di tracciamento.',
=======
                    'info'  => 'Imposta il numero di fattura, i termini di pagamento, il design dello scontrino e i promemoria della fattura.',
                    'title' => 'Impostazioni della Fattura',

                    'invoice-number' => [
                        'generator'  => 'Generatore di Numeri di Fattura',
                        'length'     => 'Lunghezza Numero di Fattura',
                        'prefix'     => 'Prefisso Numero di Fattura',
                        'suffix'     => 'Suffisso Numero di Fattura',
                        'title'      => 'Impostazioni Numero di Fattura',
                        'title-info' => 'Configurazione di regole o parametri per la generazione e l\'assegnazione di identificativi unici alle fatture per scopi organizzativi e di tracciamento.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    ],

                    'payment-terms' => [
                        'due-duration'      => 'Durata Scadenza',
<<<<<<< HEAD
                        'due-duration-day'  => ':durata-scadenza Giorno',
                        'due-duration-days' => ':durata-scadenza Giorni',
                        'title'             => 'Termini di Pagamento',
                        'title-info'        => 'Condizioni concordate che stabiliscono quando e come il pagamento dei beni o dei servizi deve essere effettuato dall\'acquirente al venditore.',
=======
                        'due-duration-day'  => ':due-duration Giorno',
                        'due-duration-days' => ':due-duration Giorni',
                        'title'             => 'Termini di Pagamento',
                        'title-info'        => 'Condizioni concordate che indicano quando e come il pagamento per beni o servizi dovrebbe essere effettuato dal compratore al venditore.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    ],

                    'invoice-slip-design' => [
                        'logo'       => 'Logo',
<<<<<<< HEAD
                        'title'      => 'Design della Scheda della Fattura',
                        'title-info' => 'Layout visivo e formattazione di una scheda della fattura, inclusi i dettagli aziendali, l\'elenco degli articoli, i prezzi e le informazioni di pagamento per una presentazione professionale.',
                    ],

                    'invoice-reminders' => [
                        'interval-between-reminders' => 'Intervallo tra i Promemoria',
                        'maximum-limit-of-reminders' => 'Limite Massimo di Promemoria',
=======
                        'title'      => 'Design dello Scontrino Fiscale',
                        'title-info' => 'Layout visivo e formattazione di uno scontrino fiscale, comprensivo di branding aziendale, dettagli di suddivisione, prezzi e dettagli di pagamento per una presentazione professionale.',
                    ],

                    'invoice-reminders' => [
                        'interval-between-reminders' => 'Intervallo tra i promemoria',
                        'maximum-limit-of-reminders' => 'Limite massimo dei promemoria',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        'title'                      => 'Promemoria della Fattura',
                        'title-info'                 => 'Notifiche o comunicazioni automatizzate inviate ai clienti per ricordare loro i pagamenti imminenti o scaduti delle fatture.',
                    ],
                ],
            ],

            'taxes' => [
<<<<<<< HEAD
                'title' => 'Taxes',

                'catalog' => [
                    'title'      => 'Catalog',
                    'title-info' => 'Set pricing and default location calculations',

                    'pricing' => [
                        'title'         => 'Pricing',
                        'title-info'    => 'Details about the cost of goods or services, including base price, discounts, taxes, and additional charges.information',
                        'tax-inclusive' => 'Tax inclusive',
                    ],

                    'default-location-calculation' => [
                        'default-country'   => 'Default Country',
                        'default-state'     => 'Default State',
                        'default-post-code' => 'Default Post Code',
                        'title'             => 'Default Location Calculation',
                        'title-info'        => 'Automated determination of a standard or initial location based on predefined factors or settings.',
=======
                'title' => 'Tasse',

                'catalog' => [
                    'title'      => 'Catalogo',
                    'title-info' => 'Imposta prezzi e calcoli della posizione predefiniti',

                    'pricing' => [
                        'title'         => 'Prezzi',
                        'title-info'    => 'Dettagli sul costo di beni o servizi, inclusi il prezzo base, gli sconti, le tasse e gli oneri aggiuntivi.',
                        'tax-inclusive' => 'Inclusiva di Tasse',
                    ],

                    'default-location-calculation' => [
                        'default-country'   => 'Paese Predefinito',
                        'default-state'     => 'Stato Predefinito',
                        'default-post-code' => 'CAP Predefinito',
                        'title'             => 'Calcolo Posizione Predefinita',
                        'title-info'        => 'Determinazione automatica di una posizione standard o iniziale basata su fattori o impostazioni predefinite.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    ],
                ],
            ],
        ],
    ],

    'components' => [
        'layouts' => [
            'header' => [
<<<<<<< HEAD
                'app-version'   => 'Versione: :version',
                'account-title' => 'Account',
                'logout'        => 'Esci',
                'my-account'    => 'Il mio Account',
=======
                'app-version'   => 'Versione : :versione',
                'account-title' => 'Account',
                'logout'        => 'Logout',
                'my-account'    => 'Il mio account',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'notifications' => 'Notifiche',
                'visit-shop'    => 'Visita il Negozio',

                'mega-search' => [
                    'categories'                      => 'Categorie',
                    'customers'                       => 'Clienti',
                    'explore-all-matching-products'   => 'Esplora tutti i prodotti corrispondenti a \":query\" (:count)',
                    'explore-all-products'            => 'Esplora tutti i prodotti',
                    'explore-all-matching-orders'     => 'Esplora tutti gli ordini corrispondenti a \":query\" (:count)',
                    'explore-all-orders'              => 'Esplora tutti gli ordini',
                    'explore-all-matching-categories' => 'Esplora tutte le categorie corrispondenti a \":query\" (:count)',
                    'explore-all-categories'          => 'Esplora tutte le categorie',
                    'explore-all-matching-customers'  => 'Esplora tutti i clienti corrispondenti a \":query\" (:count)',
                    'explore-all-customers'           => 'Esplora tutti i clienti',
                    'orders'                          => 'Ordini',
                    'products'                        => 'Prodotti',
                    'sku'                             => 'SKU: :sku',
                    'title'                           => 'Ricerca Avanzata',
                ],
            ],

            'sidebar' => [
                'attributes'               => 'Attributi',
<<<<<<< HEAD
                'attribute-families'       => 'Famiglie di attributi',
=======
                'attribute-families'       => 'Famiglie di Attributi',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'collapse'                 => 'Comprimi',
                'catalog'                  => 'Catalogo',
                'categories'               => 'Categorie',
                'customers'                => 'Clienti',
                'configure'                => 'Configura',
                'currencies'               => 'Valute',
                'channels'                 => 'Canali',
                'communications'           => 'Comunicazioni',
                'campaigns'                => 'Campagne',
                'cms'                      => 'CMS',
                'discount'                 => 'Sconto',
<<<<<<< HEAD
                'dashboard'                => 'Cruscotto',
                'email-templates'          => 'Modelli di email',
                'events'                   => 'Eventi',
                'exchange-rates'           => 'Tassi di cambio',
                'groups'                   => 'Gruppi',
                'invoices'                 => 'Fatture',
                'inventory-sources'        => 'Sorgenti di inventario',
                'locales'                  => 'Localizzazioni',
                'marketing'                => 'Marketing',
                'mode'                     => 'Modalità scura',
                'newsletter-subscriptions' => 'Iscrizioni alla newsletter',
                'orders'                   => 'Ordini',
                'products'                 => 'Prodotti',
                'promotions'               => 'Promozioni',
                'reporting'                => 'Segnalazione',
=======
                'dashboard'                => 'Dashboard',
                'email-templates'          => 'Modelli di Email',
                'events'                   => 'Eventi',
                'exchange-rates'           => 'Tassi di Cambio',
                'groups'                   => 'Gruppi',
                'invoices'                 => 'Fatture',
                'inventory-sources'        => 'Fonti di Inventario',
                'locales'                  => 'Localizzazioni',
                'marketing'                => 'Marketing',
                'mode'                     => 'Modalità Scura',
                'newsletter-subscriptions' => 'Abbonamenti alla Newsletter',
                'orders'                   => 'Ordini',
                'products'                 => 'Prodotti',
                'promotions'               => 'Promozioni',
                'reporting'                => 'Report',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'refunds'                  => 'Rimborsi',
                'reviews'                  => 'Recensioni',
                'roles'                    => 'Ruoli',
                'sales'                    => 'Vendite',
<<<<<<< HEAD
                'shipments'                => 'Spedizioni',
                'settings'                 => 'Impostazioni',
                'sitemaps'                 => 'Mappe del sito',
                'taxes'                    => 'Tasse',
                'tax-categories'           => 'Categorie fiscali',
                'tax-rates'                => 'Aliquote fiscali',
                'transactions'             => 'Transazioni',
=======
                'search-synonyms'          => 'Sinonimi di Ricerca',
                'search-terms'             => 'Termini di Ricerca',
                'search-seo'               => 'Ricerca e SEO',
                'shipments'                => 'Spedizioni',
                'settings'                 => 'Impostazioni',
                'sitemaps'                 => 'Sitemap',
                'taxes'                    => 'Tasse',
                'tax-categories'           => 'Categorie Fiscali',
                'tax-rates'                => 'Aliquote Fiscali',
                'transactions'             => 'Transazioni',
                'themes'                   => 'Temi',
                'url-rewrites'             => 'Riscrittura URL',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'users'                    => 'Utenti',
            ],
        ],

        'datagrid' => [
            'index' => [
                'must-select-a-mass-action'        => 'Devi selezionare un\'azione di massa.',
<<<<<<< HEAD
                'must-select-a-mass-action-option' => 'Devi selezionare un\'opzione dell\'azione di massa.',
                'no-records-selected'              => 'Nessun record è stato selezionato.',
=======
                'must-select-a-mass-action-option' => 'Devi selezionare un\'opzione per l\'azione di massa.',
                'no-records-selected'              => 'Nessun record selezionato.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ],

            'toolbar' => [
                'mass-actions' => [
                    'select-action' => 'Seleziona Azione',
                    'select-option' => 'Seleziona Opzione',
                    'submit'        => 'Invia',
                ],

                'filter' => [
<<<<<<< HEAD
                    'title' => 'Filtra',
                ],

                'search' => [
                    'title' => 'Cerca',
=======
                    'title' => 'Filtro',
                ],

                'search' => [
                    'title' => 'Ricerca',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                ],
            ],

            'filters' => [
<<<<<<< HEAD
                'select' => 'Seleziona.',
=======
                'select' => 'Seleziona',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'title'  => 'Applica Filtri',

                'dropdown' => [
                    'searchable' => [
                        'atleast-two-chars' => 'Digita almeno 2 caratteri...',
                        'no-results'        => 'Nessun risultato trovato...',
                    ],
                ],

                'custom-filters' => [
                    'clear-all' => 'Cancella Tutto',
                    'title'     => 'Filtri Personalizzati',
                ],

                'boolean-options' => [
                    'false' => 'Falso',
                    'true'  => 'Vero',
                ],

                'date-options' => [
<<<<<<< HEAD
                    'last-month'        => 'Mese Scorso',
=======
                    'last-month'        => 'Ultimo Mese',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'last-three-months' => 'Ultimi 3 Mesi',
                    'last-six-months'   => 'Ultimi 6 Mesi',
                    'today'             => 'Oggi',
                    'this-week'         => 'Questa Settimana',
                    'this-month'        => 'Questo Mese',
                    'this-year'         => 'Questo Anno',
                    'yesterday'         => 'Ieri',
                ],
            ],

            'table' => [
                'actions'              => 'Azioni',
                'no-records-available' => 'Nessun Record Disponibile.',
            ],
        ],

        'modal' => [
            'confirm' => [
<<<<<<< HEAD
                'agree-btn'    => 'Concorda',
                'disagree-btn' => 'Non Concordare',
=======
                'agree-btn'    => 'Concordo',
                'disagree-btn' => 'Non Concordo',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'message'      => 'Sei sicuro di voler eseguire questa azione?',
                'title'        => 'Sei sicuro?',
            ],
        ],

        'products' => [
            'search' => [
<<<<<<< HEAD
                'add-btn'     => 'Aggiungi Prodotto Selezionato',
                'empty-title' => 'Nessun prodotto trovato',
                'empty-info'  => 'Nessun prodotto disponibile per il termine di ricerca.',
                'qty'         => ':qty Disponibili',
                'sku'         => 'SKU - :sku',
                'title'       => 'Seleziona Prodotti',
=======
                'add-btn'       => 'Aggiungi prodotto selezionato',
                'empty-info'    => 'Nessun prodotto disponibile per il termine di ricerca.',
                'empty-title'   => 'Nessun prodotto trovato',
                'product-image' => 'Immagine del prodotto',
                'qty'           => ':qty disponibile',
                'sku'           => 'SKU - :sku',
                'title'         => 'Seleziona i prodotti',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ],
        ],

        'media' => [
            'images' => [
                'add-image-btn'     => 'Aggiungi Immagine',
                'allowed-types'     => 'png, jpeg, jpg',
                'not-allowed-error' => 'Sono consentiti solo file immagine (.jpeg, .jpg, .png, ..).',
<<<<<<< HEAD

                'placeholders'  => [
                    'front'     => 'Fronte',
                    'next'      => 'Successivo',
=======
                'ai-add-image-btn'  => 'Intelligenza Artificiale',
                'ai-btn-info'       => 'Genera Immagine',

                'ai-generation' => [
                    '1024x1024'        => '1024x1024',
                    '1024x1792'        => '1024x1792',
                    '1792x1024'        => '1792x1024',
                    'apply'            => 'Applica',
                    'dall-e-2'         => 'Dall.E 2',
                    'dall-e-3'         => 'Dall.E 3',
                    'generate'         => 'Genera',
                    'generating'       => 'Generazione in corso...',
                    'hd'               => 'HD',
                    'model'            => 'Modello',
                    'number-of-images' => 'Numero di Immagini',
                    'prompt'           => 'Prompt',
                    'quality'          => 'Qualità',
                    'regenerate'       => 'Rigenera',
                    'regenerating'     => 'Rigenerazione in corso...',
                    'size'             => 'Dimensione',
                    'standard'         => 'Standard',
                    'title'            => 'Generazione Immagini con AI',
                ],

                'placeholders'  => [
                    'front'     => 'Frontale',
                    'next'      => 'Successiva',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    'size'      => 'Dimensione',
                    'use-cases' => 'Casi d\'Uso',
                    'zoom'      => 'Zoom',
                ],
            ],

            'videos' => [
                'add-video-btn'     => 'Aggiungi Video',
                'allowed-types'     => 'mp4, webm, mkv',
                'not-allowed-error' => 'Sono consentiti solo file video (.mp4, .mov, .ogg ..).',
            ],
        ],
<<<<<<< HEAD
=======

        'tinymce' => [
            'ai-btn-tile' => 'Magia AI',

            'ai-generation' => [
                'title'                  => 'Assistenza AI',
                'prompt'                 => 'Suggerimento',
                'generating'             => 'Generazione...',
                'generate'               => 'Genera',
                'generated-content'      => 'Contenuto Generato',
                'generated-content-info' => 'Il contenuto AI può essere ingannevole. Si prega di rivedere il contenuto generato prima di applicarlo.',
                'apply'                  => 'Applica',
            ],
        ],
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    ],

    'acl' => [
        'attributes'               => 'Attributi',
<<<<<<< HEAD
        'attribute-families'       => 'Famiglie di attributi',
=======
        'attribute-families'       => 'Famiglie di Attributi',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        'addresses'                => 'Indirizzi',
        'cancel'                   => 'Annulla',
        'cms'                      => 'CMS',
        'catalog'                  => 'Catalogo',
        'copy'                     => 'Copia',
        'categories'               => 'Categorie',
        'customers'                => 'Clienti',
        'channels'                 => 'Canali',
        'configure'                => 'Configura',
        'currencies'               => 'Valute',
        'create'                   => 'Aggiungi',
<<<<<<< HEAD
        'cart-rules'               => 'Regole del carrello',
        'catalog-rules'            => 'Regole del catalogo',
=======
        'cart-rules'               => 'Regole del Carrello',
        'catalog-rules'            => 'Regole del Catalogo',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        'communications'           => 'Comunicazioni',
        'campaigns'                => 'Campagne',
        'dashboard'                => 'Dashboard',
        'delete'                   => 'Elimina',
<<<<<<< HEAD
        'exchange-rates'           => 'Tassi di cambio',
        'edit'                     => 'Modifica',
        'email-templates'          => 'Template email',
        'events'                   => 'Eventi',
        'groups'                   => 'Gruppi',
        'invoices'                 => 'Fatture',
        'inventory-sources'        => 'Sorgenti inventario',
        'locales'                  => 'Lingue',
        'mass-delete'              => 'Cancella tutto',
        'mass-update'              => 'Aggiorna tutto',
        'marketing'                => 'Marketing',
        'newsletter-subscriptions' => 'Iscrizioni alla newsletter',
=======
        'exchange-rates'           => 'Tassi di Cambio',
        'edit'                     => 'Modifica',
        'email-templates'          => 'Modelli di Email',
        'events'                   => 'Eventi',
        'groups'                   => 'Gruppi',
        'invoices'                 => 'Fatture',
        'inventory-sources'        => 'Fonti di Inventario',
        'locales'                  => 'Localizzazioni',
        'marketing'                => 'Marketing',
        'newsletter-subscriptions' => 'Abbonamenti alla Newsletter',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        'note'                     => 'Nota',
        'orders'                   => 'Ordini',
        'products'                 => 'Prodotti',
        'promotions'               => 'Promozioni',
<<<<<<< HEAD
=======
        'reporting'                => 'Report',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        'refunds'                  => 'Rimborsi',
        'reviews'                  => 'Recensioni',
        'roles'                    => 'Ruoli',
        'sales'                    => 'Vendite',
<<<<<<< HEAD
        'shipments'                => 'Spedizioni',
        'settings'                 => 'Impostazioni',
        'subscribers'              => 'Iscritti alla newsletter',
        'sitemaps'                 => 'Mappe del sito',
        'taxes'                    => 'Tasse',
        'themes'                   => 'Temi',
        'tax-categories'           => 'Categorie fiscali',
        'tax-rates'                => 'Aliquote fiscali',
        'transactions'             => 'Transazioni',
        'users'                    => 'Utenti',
        'view'                     => 'Visualizza',
=======
        'search-synonyms'          => 'Sinonimi di Ricerca',
        'search-terms'             => 'Termini di Ricerca',
        'search-seo'               => 'Ricerca & SEO',
        'shipments'                => 'Spedizioni',
        'settings'                 => 'Impostazioni',
        'subscribers'              => 'Abbonati alla Newsletter',
        'sitemaps'                 => 'Sitemap',
        'taxes'                    => 'Tasse',
        'themes'                   => 'Temi',
        'tax-categories'           => 'Categorie Fiscali',
        'tax-rates'                => 'Aliquote Fiscali',
        'transactions'             => 'Transazioni',
        'url-rewrites'             => 'Riscritture URL',
        'users'                    => 'Utenti',
        'view'                     => 'Vedi',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    ],

    'errors' => [
        'dashboard' => 'Dashboard',
        'go-back'   => 'Torna Indietro',
        'support'   => 'Se il problema persiste, contattaci su <a href=":link" class=":class">:email</a> per assistenza.',

        '404' => [
<<<<<<< HEAD
            'description' => 'Ops! La pagina che stai cercando è in vacanza. Sembra che non siamo riusciti a trovare ciò che cercavi.',
=======
            'description' => 'Ops! La pagina che stai cercando è in vacanza. Sembra che non riusciamo a trovare quello che stavi cercando.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            'title'       => '404 Pagina Non Trovata',
        ],

        '401' => [
<<<<<<< HEAD
            'description' => 'Ops! Sembra che tu non abbia il permesso di accedere a questa pagina. Sembra che tu stia mancando le credenziali necessarie.',
=======
            'description' => 'Ops! Sembra che tu non abbia il permesso di accedere a questa pagina. Pare che ti manchino le credenziali necessarie.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            'title'       => '401 Non Autorizzato',
        ],

        '403' => [
<<<<<<< HEAD
            'description' => 'Ops! Questa pagina è fuori limite. Sembra che tu non abbia le autorizzazioni necessarie per visualizzare questo contenuto.',
            'title'       => '403 Accesso Negato',
        ],

        '500' => [
            'description' => 'Ops! Qualcosa è andato storto. Sembra che stiamo avendo problemi nel caricare la pagina che stai cercando.',
=======
            'description' => 'Ops! Questa pagina è fuori limiti. Sembra che tu non abbia le autorizzazioni necessarie per visualizzare questo contenuto.',
            'title'       => '403 Accesso Vietato',
        ],

        '500' => [
            'description' => 'Ops! Qualcosa è andato storto. Sembra che abbiamo problemi a caricare la pagina che stai cercando.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            'title'       => '500 Errore Interno del Server',
        ],

        '503' => [
<<<<<<< HEAD
            'description' => 'Ops! Sembra che siamo temporaneamente offline per manutenzione. Ti preghiamo di tornare più tardi.',
=======
            'description' => 'Ops! Sembra che siamo temporaneamente fuori servizio per manutenzione. Riprova tra un po\'.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            'title'       => '503 Servizio Non Disponibile',
        ],
    ],

    'export' => [
<<<<<<< HEAD
        'allowed-type'     => 'Tipo Consentito :',
        'csv'              => 'CSV',
        'download'         => 'Scarica',
        'duplicate-error'  => 'L\'identificatore deve essere univoco, identificatore duplicato :identifier alla riga :position.',
        'enough-row-error' => 'Il file non ha abbastanza righe',
        'export'           => 'Esporta',
        'file-type'        => 'csv, xls, xlsx.',
        'file'             => 'File',
        'format'           => 'Seleziona il Formato',
        'import'           => 'Importa',
        'illegal-format'   => 'Errore! Questo tipo di formato non è supportato o è un formato illegale',
        'no-records'       => 'Niente da esportare',
        'upload'           => 'Carica',
        'upload-error'     => 'Il file deve essere di tipo: xls, xlsx, csv.',
        'upload-success'   => ':name Caricato con successo',
=======
        'csv'              => 'CSV',
        'download'         => 'Scarica',
        'export'           => 'Esporta',
        'no-records'       => 'Niente da esportare',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        'xls'              => 'XLS',
    ],

    'validations' => [
<<<<<<< HEAD
        'slug-being-used' => 'Questo slug è in uso in categorie o prodotti.',
=======
        'slug-being-used' => 'Questo slug è utilizzato in categorie o prodotti.',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        'slug-reserved'   => 'Questo slug è riservato.',
    ],

    'footer' => [
<<<<<<< HEAD
        'copy-right' => 'Realizzato da <a href="https://bagisto.com/" target="_blank">Bagisto</a>, Un Progetto della Comunità di <a href="https://webkul.com/" target="_blank">Webkul</a>',
=======
        'copy-right' => 'Realizzato da <a href="https://bagisto.com/" target="_blank">Bagisto</a>, un progetto della community di <a href="https://webkul.com/" target="_blank">Webkul</a>',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    ],

    'emails' => [
        'dear'   => 'Caro :admin_name',
<<<<<<< HEAD
        'thanks' => 'Se hai bisogno di assistenza, ti preghiamo di contattarci su <a href=":link" style=":style">:email</a>.<br/>Grazie!',

        'admin' => [
            'forgot-password' => [
                'description'    => 'Stai ricevendo questa email perché abbiamo ricevuto una richiesta di ripristino password per il tuo account.',
                'greeting'       => 'Hai dimenticato la Password!',
                'reset-password' => 'Ripristina Password',
                'subject'        => 'Email di Ripristino Password',
=======
        'thanks' => 'Se hai bisogno di aiuto, contattaci all\'indirizzo <a href=":link" style=":style">:email</a>.<br/>Grazie!',

        'admin' => [
            'forgot-password' => [
                'description'    => 'Stai ricevendo questa email perché abbiamo ricevuto una richiesta di reset della password per il tuo account.',
                'greeting'       => 'Password dimenticata!',
                'reset-password' => 'Resetta Password',
                'subject'        => 'Email di Reset della Password',
            ],
        ],

        'customers' => [
            'registration' => [
                'description' => 'Un nuovo account cliente è stato creato con successo. Ora possono accedere utilizzando il proprio indirizzo e-mail e le credenziali della password. Una volta effettuato l`accesso, avranno accesso a vari servizi, inclusa la possibilità di rivedere gli ordini passati, gestire le liste dei desideri e aggiornare le informazioni del proprio account.',
                'greeting'    => 'Diamo un caloroso benvenuto al nuovo cliente, :customer_name che si è appena registrato con noi!',
                'subject'     => 'Nuova registrazione cliente',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ],
        ],

        'orders' => [
            'created' => [
                'greeting' => 'Hai un nuovo ordine :order_id effettuato il :created_at',
<<<<<<< HEAD
                'subject'  => 'Conferma del Nuovo Ordine',
                'summary'  => 'Riepilogo dell\'Ordine',
                'title'    => 'Conferma dell\'Ordine!',
            ],

            'invoiced' => [
                'greeting' => 'La tua fattura #:invoice_id per l\'ordine :order_id è stata creata il :created_at',
                'subject'  => 'Conferma della Nuova Fattura',
                'summary'  => 'Riepilogo della Fattura',
                'title'    => 'Conferma della Fattura!',
=======
                'subject'  => 'Nuova Conferma Ordine',
                'summary'  => 'Riepilogo dell\'Ordine',
                'title'    => 'Conferma Ordine!',
            ],

            'invoiced' => [
                'subject'  => 'Nuova Conferma Fattura',
                'title'    => 'Conferma Fattura!',
                'greeting' => 'La tua fattura #:invoice_id per l\'ordine :order_id è stata creata il :created_at',
                'summary'  => 'Riepilogo della Fattura',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ],

            'shipped' => [
                'greeting' => 'Hai spedito l\'ordine :order_id effettuato il :created_at',
<<<<<<< HEAD
                'subject'  => 'Conferma della Nuova Spedizione',
=======
                'subject'  => 'Nuova Conferma Spedizione',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'summary'  => 'Riepilogo della Spedizione',
                'title'    => 'Ordine Spedito!',
            ],

            'inventory-source' => [
                'greeting' => 'Hai spedito l\'ordine :order_id effettuato il :created_at',
<<<<<<< HEAD
                'subject'  => 'Conferma della Nuova Spedizione',
=======
                'subject'  => 'Nuova Conferma Spedizione',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'summary'  => 'Riepilogo della Spedizione',
                'title'    => 'Ordine Spedito!',
            ],

            'refunded' => [
<<<<<<< HEAD
                'greeting' => 'Hai rimborsato l\'ordine :order_id effettuato il :created_at',
                'subject'  => 'Conferma del Nuovo Rimborso',
=======
                'greeting' => 'Hai effettuato il rimborso per l\'ordine :order_id effettuato il :created_at',
                'subject'  => 'Nuova Conferma Rimborso',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'summary'  => 'Riepilogo del Rimborso',
                'title'    => 'Ordine Rimborsato!',
            ],

            'canceled' => [
                'greeting' => 'Hai annullato l\'ordine :order_id effettuato il :created_at',
<<<<<<< HEAD
                'subject'  => 'Nuovo Ordine Annullato',
=======
                'subject'  => 'Nuova Conferma Annullamento Ordine',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'summary'  => 'Riepilogo dell\'Ordine',
                'title'    => 'Ordine Annullato!',
            ],

            'billing-address'   => 'Indirizzo di Fatturazione',
            'contact'           => 'Contatto',
            'discount'          => 'Sconto',
            'grand-total'       => 'Totale Generale',
            'name'              => 'Nome',
            'payment'           => 'Pagamento',
            'price'             => 'Prezzo',
            'qty'               => 'Qtà',
            'shipping-address'  => 'Indirizzo di Spedizione',
            'shipping'          => 'Spedizione',
            'sku'               => 'SKU',
            'subtotal'          => 'Subtotale',
<<<<<<< HEAD
            'shipping-handling' => 'Spedizione e Gestione',
            'tax'               => 'Tassa',
=======
            'shipping-handling' => 'Spedizione e Manipolazione',
            'tax'               => 'Imposta',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ],
    ],
];
