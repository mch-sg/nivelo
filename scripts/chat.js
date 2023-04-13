
// Enter til at sende besked
// 
var textarea = document.getElementById("messageid");

if(textarea) {
textarea.addEventListener("keydown", function(event) {
    if (event.key === "Enter" && !event.shiftKey) {
        event.preventDefault();
        this.form.submit();
    }
    if (event.key === "Enter" && event.shiftKey) {
      var scrollTop = this.scrollTop;
      this.scrollTop = scrollTop;
    }
});
} 
    

// find nuværende URL til
// at sætte aktiv side i menuen
var minUrl = window.location.href;

// Loop
var links = document.querySelectorAll('.sid');
links.forEach(function(link) {
  if (link.href === minUrl) {
    link.classList.add('active-side');
  }
});
