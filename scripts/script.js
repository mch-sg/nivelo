

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
