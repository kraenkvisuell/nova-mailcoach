<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Aleo:ital,wght@0,300;0,400;1,300;1,400&family=Roboto+Condensed:wght@700&display=swap');

#emailBody * {
    /* outline: 1px solid red; */
}

#emailBody a {
    color: #000000;
    text-decoration: none;
}

#emailBody {
    background-image: url('{{ config('app.url')."/img/newsletter-bg.png" }}');
    background-repeat: repeat;
    font-family: Aleo, Georgia, serif;
    font-size: 17px;
    font-weight: 400;
    line-height: 26px;
    color: #000000;
}

#emailBody h1, #emailBody h2, #emailBody h3, #emailBody h4, #emailBody h5, #emailBody h6 {
    display: block;
    font-weight: 700;
    font-size: 25px;
    line-height: 28px;
    letter-spacing: 0.04em;
    font-family: 'Roboto Condensed', Helvetica, arial, sans-serif;
    text-transform: uppercase;
    margin-top: 1em;
    margin-bottom: 1em;
}

#emailBody p {
    margin-top: 1em;
    margin-bottom: 1em;
}

#emailBody {
    border: 10px solid #ffffff;
}

#emailBody #emailContainer tr td {
    padding-left: 22px;
    padding-right: 22px;
}

#emailBody table.blocks {
    max-width: 560px;
}

#emailBody table.block {
    width: 100%;
    display: table;
}

#emailBody table.block.is-66 {
    width: 66%;
}

#emailBody table.block.is-centered {
    text-align: center;
}

#emailBody table.block.is-right {
    text-align: right;
}

#emailBody table.block.is-small {
    font-size: 13px;
    line-height: 20px;
}

#emailBody table.block.is-small h1,
table.block.is-small h2,
table.block.is-small h3,
table.block.is-small h4,
table.block.is-small h5,
table.block.is-small h6 {
    font-size: 15px;
    line-height: 18px;
}

#emailBody table.block tr td {

}

#emailBody table.block.is-divider {
    margin-top: 10px;
}

#emailBody table.block.is-divider tr td {
    padding-bottom: 20px;
}

#emailBody table.block.is-heading {
    text-align: center;
}

#emailBody table.block.is-text td {
    padding-bottom: 12px;
}



#emailBody table.block.is-heading h1.headline {
    font-size: 35px;
    line-height: 40px;
}

#emailBody table.block.is-heading .topline {
    font-size: 13px;
    font-weight: bold;
    margin-bottom: 12px;
}

#emailBody table.block.is-image img {
    width: 100%;
    height: auto;
    border: 5px solid white;
    box-shadow: 1px 1px 4px 0px rgba(0,0,0,0.18);
}

#emailBody table.block.is-quote {
    text-align: center;
}

#emailBody table.block.is-quote .quote {
    font-size: 20px;
    line-height: 30px;
    font-weight: 300;
    font-style: italic;
}

#emailBody table.block.is-quote .quote-from {
    font-size: 13px;
    line-height: 18px;
    padding-top: 17px;
    padding-bottom: 9px;
}

#emailBody table.block.is-link-list td {
    width: 60%;
    vertical-align: middle;
}

#emailBody table.block.is-link-list td.list-button-container {
    width: 40%;
    text-align: right;
}

#emailBody table.block.is-link-list td.list-button-container img {
    width: 100%;
    height: auto;
}

#emailBody table.block.is-link-list .link-list-headline {
    font-size: 13px;
    line-height: 20px;
    font-weight: 700;
    margin-bottom: 12px;
}

#emailBody table.block.is-link-list ul {
    padding: 0;
    margin: 0;
    margin-bottom: 25px;
}

#emailBody table.block.is-link-list li {
    list-style: none;
    padding: 0;
    margin: 0;
    font-size: 20px;
    line-height: 38px;
    letter-spacing: 0.04em;
    font-family: 'Roboto Condensed', Helvetica, arial, sans-serif;
    text-transform: uppercase;
}

#emailBody table.block.is-link-list li a {
    text-decoration: underline;
}

#emailBody table.block.is-link-list li p {
    padding: 0;
    margin: 0;
}

#emailBody table.block.is-social-links {
    text-align: center;
}

#emailBody table.block.is-social-links td {
    padding-bottom: 35px;
}

#emailBody table.block.is-social-links .social-links-headline {
    font-size: 13px;
    line-height: 20px;
    font-weight: 700;
    margin-bottom: 9px;
}

#emailBody table.block.is-social-links .hashtag {
    font-size: 25px;
    line-height: 28px;
    letter-spacing: 0.04em;
    font-family: 'Roboto Condensed', Helvetica, arial, sans-serif;
    text-transform: uppercase;
    margin-bottom: 12px;
}

#emailBody .social-icons-container img {
    display: inline-block;
    width: 42px;
    height: auto;
    margin-left: 12px;
    margin-right: 12px;
}

#emailBody table.block.is-divider {
    border-top: 1px solid black;
}

#emailBody .button-container {
    text-align: center;
    padding-top: 4px;
    padding-bottom: 12px;
}

#emailBody .button {
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

#emailBody table.header, table.secondary, table.footer {
    width: 100%;
}

#emailBody table.header td {
    text-align: center;
    border-top: 5px solid #509F53;
}

#emailBody table.header td img {
    position: relative;
    top: -16px;
    height: 56px;
    width: auto;
    z-index: 2;
}

#emailBody table.footer {
    border-top: 2px solid #000000;
}

#emailBody table.secondary {
    font-family: 'Roboto Condensed', Helvetica, arial, sans-serif;
    font-weight: 700;
    font-size: 11px;
    color: #999999;
    text-transform: uppercase;
}

#emailBody table.secondary td {
    padding-top: 8px;
    padding-bottom: 6px;
}

#emailBody table.secondary a {
    color: #999999;
    text-decoration: none;
}

</style>
