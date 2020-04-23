<!-- Page regroupant les informations sur l'histoire du club, les horaires d'entrainement et le lieu du gymnase -->
<?php session_start(); // L'utilisateur est connecté
include '../controler/header.ctrl.php'; ?>
<link rel="stylesheet" href="../framework/informations.css">
<img src="../view/Images/backgroundInformation.jpg" alt="Background" class="imgBackground">
</header>



<div class = "HistoireDuSport">
<section id = "HistoireDuSport"></section>
  <h2>La Boxe Thai</h2>
  <div class="textHistoire">
    <p>La boxe thaïlandaise abrégée boxe thaï ou encore muay-thaï est un art marial pieds points.</p>
    <p>C’est probablement la boxe la plus complète puisqu’on utilise toutes les parties du corps pour frapper son opposant.</p>
    <p>La boxe anglaise utilise les poings, la boxe française utilise les pieds et les poings, et la boxe thaï ajoute les coudes et les genoux.</p>
    <p>C’est sans aucun doute la boxe la plus populaire d’Asie du Sud-Est, loin devant la boxe birmane ou la boxe khmère. Elle tire son origine des pratiques martiales ancestrales notamment le muy boran et le krabi krabong. Elle était boudée par les occidentaux qu’elle effrayait un peu par sa violence, mais elle s’est aujourd’hui très largement démocratisée et on trouve des clubs dans toutes les grandes villes d’Europe ou d’Amérique du Nord.</p>
  </div>
</div>

<div class = "DescriptionClub">
<section id = "DescriptionClub"></section>
  <h2>Le Club</h2>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias veniam deserunt dolorum voluptatum. Aliquam placeat incidunt labore quasi veritatis nesciunt at libero aperiam, eos reprehenderit? Quos velit vero molestiae itaque!</p>
</div>


<div class="Horaires">
<section id = "Horaires"></section>
  <h2>Horaires</h2>
  <img src="../view/Images/emploi_du_temps.png" alt="Horaires">
</div>

<div class = "Localisation">
<section id ="Localisation"></section>
  <h2>Localisation</h2>
  <div class="map-responsive">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2812.061733990776!2d5.724201151354089!3d45.1858465598916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478af45e647eca63%3A0x850a479ce6fc3792!2sHoche%20Sports%20Center!5e0!3m2!1sen!2sfr!4v1575637186073!5m2!1sen!2sfr" width="800" height="650" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
  </div>
</div>

<?php include '../view/footer.view.php' ?>
  </body>
</html>
