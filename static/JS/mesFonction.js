if (document.getElementsByClassName("inactive").addEventListener("click", change_class));

function change_class(name)
{   const element = document.getElementsByClassName("inactive");
    element.classList.remove("inactive");
    element.classList.add("active");
};