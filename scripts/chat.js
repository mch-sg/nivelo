
// Enter key to submit form
// 
var textarea = document.getElementById("messageid");

if(textarea) {
textarea.addEventListener("keydown", function(event) {
    if (event.key === "Enter" && !event.ctrlKey || event.key === "Enter" && !event.shiftKey) {
        event.preventDefault();
        this.form.submit();
    }
    if (event.key === "Enter" && event.ctrlKey || event.key === "Enter" && event.shiftKey) {
      var scrollTop = this.scrollTop;

      // Insert a new line
      var start = this.selectionStart;
      var end = this.selectionEnd;
      var value = this.value;
      this.value = value.substring(0, start) + "\n" + value.substring(end);
      this.selectionStart = this.selectionEnd = start + 1;

      // Scroll back to the previous position
      this.scrollTop = scrollTop;
    }
});
} 
    

function scrollChatboxToBottom() {
const chatbox = document.getElementById('chatbox');
    chatbox.scrollTop = chatbox.scrollHeight;   
}

window.onload = scrollChatboxToBottom();