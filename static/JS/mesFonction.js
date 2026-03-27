
document.getElementById("nav_home").addEventListener("click", changerSection);
document.getElementById("nav_video").addEventListener("click", changerSection);
document.getElementById("nav_resources").addEventListener("click", changerSection);
document.getElementById("nav_capteur").addEventListener("click", changerSection);

function changerSection()
{
  console.debug(this);
  if(this.id == "nav_home")
  {
    document.getElementById("windows_home").style.display = "block";
    document.getElementById("windows_video").style.display = "none";
    document.getElementById("windows_resources").style.display = "none";
    document.getElementById("windows_capteur").style.display = "none";
  }
  else if(this.id == "nav_video")
  {
    document.getElementById("windows_home").style.display = "none";
    document.getElementById("windows_video").style.display = "block";
    document.getElementById("windows_resources").style.display = "none";
    document.getElementById("windows_capteur").style.display = "none";
  }
  else if(this.id == "nav_resources")
  {
    document.getElementById("windows_home").style.display = "none";
    document.getElementById("windows_video").style.display = "none";
    document.getElementById("windows_resources").style.display = "block";
    document.getElementById("windows_capteur").style.display = "none";
  }
  else if(this.id == "nav_capteur")
  {
    document.getElementById("windows_home").style.display = "none";
    document.getElementById("windows_video").style.display = "none";
    document.getElementById("windows_resources").style.display = "none";
    document.getElementById("windows_capteur").style.display = "block";
  }
}

/*_______________________________ *lorsque que widget home video click afficher windows video*_______________________________*/
