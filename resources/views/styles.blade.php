<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Aleo:ital,wght@0,300;0,400;1,300;1,400&family=Roboto+Condensed:wght@700&display=swap');

* {
    /* outline: 1px solid red; */
}

a {
    color: #000000;
    text-decoration: none;
}


body, #bodyTable {
    background-image: url('{{ config('app.url')."/img/newsletter-bg.png" }}');
    background-repeat: repeat;
    font-family: Aleo, Georgia, serif;
    font-size: 16px;
    font-weight: 400;
    line-height: 23px;
    color: #000000;
}

h1, h2, h3, h4, h5, h6 {
    font-weight: 700;
    font-size: 25px;
    line-height: 28px;
    letter-spacing: 0.04em;
    font-family: 'Roboto Condensed', Helvetica, arial, sans-serif;
    text-transform: uppercase;
}

#bodyTable {
    border: 10px solid #ffffff;
}
#emailContainer > tr > td {
    padding-left: 22px;
    padding-right: 22px;
}

table.blocks {
    width: 440px;
}

table.block {
    width: 100%;
}

table.block.is-66 {
    width: 66%;
}

table.block.is-centered {
    text-align: center;
}

table.block.is-right {
    text-align: right;
}

table.block.is-small {
    font-size: 13px;
    line-height: 20px;
}

table.block.is-small h1,
table.block.is-small h2,
table.block.is-small h3,
table.block.is-small h4,
table.block.is-small h5,
table.block.is-small h6 {
    font-size: 15px;
    line-height: 18px;
}

table.block > tr > td {
    padding-top: 12px;
    padding-bottom: 12px;
}

table.block.is-divider > tr > td {
    padding-bottom: 2px;
}

table.block.is-heading {
    text-align: center;
}
table.block.is-heading h1.headline {
    font-size: 35px;
    line-height: 40px;
}
table.block.is-heading .topline {
    font-size: 13px;
    font-weight: bold;
    margin-bottom: 12px;
}

table.block.is-image img {
    width: 100%;
    height: auto;
    border: 5px solid white;
    box-shadow: 1px 1px 4px 0px rgba(0,0,0,0.18);
}

table.block.is-quote {
    text-align: center;
}

table.block.is-quote .quote {
    font-size: 20px;
    line-height: 30px;
    font-weight: 300;
    font-style: italic;
}

table.block.is-quote .quote-from {
    font-size: 13px;
    line-height: 18px;
    padding-top: 17px;
    padding-bottom: 9px;
}

table.block.is-link-list td {
    width: 60%;
    vertical-align: middle;
}
table.block.is-link-list td.list-button-container {
    width: 40%;
    text-align: right;
}
table.block.is-link-list td.list-button-container img {
    width: 100%;
    height: auto;
}

table.block.is-link-list .link-list-headline {
    font-size: 13px;
    line-height: 20px;
    font-weight: 700;
    margin-bottom: 12px;
}

table.block.is-link-list ul {
    padding: 0;
    margin: 0;
    margin-bottom: 25px;
}
table.block.is-link-list li {
    list-style: none;
    padding: 0;
    margin: 0;
    font-size: 20px;
    line-height: 38px;
    letter-spacing: 0.04em;
    font-family: 'Roboto Condensed', Helvetica, arial, sans-serif;
    text-transform: uppercase;
}
table.block.is-link-list li a {
    text-decoration: underline;
}

table.block.is-link-list li p {
    padding: 0;
    margin: 0;
}

table.block.is-social-links {
    text-align: center;
}

table.block.is-social-links td {
    padding-bottom: 35px;
}

table.block.is-social-links .social-links-headline {
    font-size: 13px;
    line-height: 20px;
    font-weight: 700;
    margin-bottom: 9px;
}

table.block.is-social-links .hashtag {
    font-size: 25px;
    line-height: 28px;
    letter-spacing: 0.04em;
    font-family: 'Roboto Condensed', Helvetica, arial, sans-serif;
    text-transform: uppercase;
    margin-bottom: 12px;
}

.social-icons-container img {
    display: inline-block;
    width: 42px;
    height: auto;
    margin-left: 12px;
    margin-right: 12px;
}

table.block.is-divider {
    border-top: 1px solid black;
}

.button-container {
    text-align: center;
    padding-top: 4px;
    padding-bottom: 12px;
}

.button {
    display: inline-block;
    background-color: #509F53;
    color: white;
    font-size:12px;
    line-height: 12px;
    letter-spacing: 0.04em;
    font-family: 'Roboto Condensed', Helvetica, arial, sans-serif;
    text-transform: uppercase;
    text-decoration: none;
    padding-top: 8px;
    padding-bottom: 6px;
    padding-left: 14px;
    padding-right: 14px;
}

table.header, table.secondary, table.footer {
    width: 100%;
}
table.header td {
    text-align: center;
    border-top: 5px solid #509F53;
}
table.header td img {
    position: relative;
    top: -16px;
    height: 56px;
    width: auto;
    z-index: 2;
}

table.footer {
    border-top: 2px solid #000000;
}

table.secondary {
    font-size: 10px;
    color: #999999;
    text-transform: uppercase;
}

table.secondary td {
    padding-top: 8px;
    padding-bottom: 6px;
}

table.secondary a {
    color: #999999;
    text-decoration: none;
}

</style>
