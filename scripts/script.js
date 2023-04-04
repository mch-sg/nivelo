




// modal toggle
// *
// *

const openModalButtons = document.querySelectorAll('[data-modal-target]')
const closeModalButtons = document.querySelectorAll('[data-close-button]')
const acceptModalButtons = document.querySelectorAll('[data-accept-button]')
const rejectModalButtons = document.querySelectorAll('[data-reject-button]')
const overlay = document.getElementById('overlay')


if(!localStorage.getItem('seenCookie')) {
    document.getElementById('modal').classList.add('active');
    document.getElementById('overlay').classList.add('active');


    rejectModalButtons.forEach(button => {
        button.addEventListener('click', () => {
          const modal = button.closest('.modal')
          closeModal(modal)
          localStorage.setItem('cookieStatus', 'rejected');
        })
    })

    acceptModalButtons.forEach(button => {
        button.addEventListener('click', () => {
          const modal = button.closest('.modal')
          closeModal(modal)
          localStorage.setItem('cookieStatus', 'accepted');
        })
    })

    overlay.addEventListener('click', () => {
        const modals = document.querySelectorAll('.modal.active')
        modals.forEach(modal => {
            closeModal(modal)
        })
    })

    function closeModal(modal) {
        if (modal == null) return
        modal.classList.remove('active');
        overlay.classList.remove('active');
        localStorage.setItem('seenCookie', '1');
    }


    localStorage.setItem('seenCookie', '1');
}



// Enter key to submit form
// 
document.getElementById("messageid").addEventListener("keydown", function(event) {
    if (event.key === "Enter" && !event.shiftKey) {
      event.preventDefault();
      this.form.submit();
    }
});


function scrollChatboxToBottom() {
const chatbox = document.getElementById('chatbox');
chatbox.scrollTop = chatbox.scrollHeight;
}

window.onload = scrollChatboxToBottom();

  
function deleteAllCookies() {
    var cookies = document.cookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
      var cookieName = cookies[i].split('=')[0];
      document.cookie = cookieName + '=;expires=Thu, 01 Jan 1970 00:00:00 GMT;path=/';
    }
}
  