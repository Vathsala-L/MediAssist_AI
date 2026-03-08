<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>MediAssist AI Chatbot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background-color: #e8f4f8; }
        .chat-container { max-width:600px; margin:auto; }
        .message { border-radius: 20px; padding: 12px; margin: 10px 0; width: fit-content; max-width:80%; }
        .user-msg { background-color: #007bff; color: white; margin-left:auto; text-align:right; }
        .bot-msg { background-color: #f1f1f1; color: black; margin-right:auto; text-align:left; }
        .chat-input { width:100%; border-radius: 50px; padding:10px; }
        .send-btn { border-radius:50px; }
        .avatar { width:35px; height:35px; border-radius:50%; margin-right:10px; }
        .chat-box { height:400px; overflow-y:auto; background:white; padding:15px; border-radius:15px; box-shadow:0 4px 10px rgba(0,0,0,0.1);}
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand" href="chat.php"><i class="bi bi-heart-pulse-fill"></i> MediAssist AI</a>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item"><a class="nav-link" href="history.php"><i class="bi bi-clock-history"></i> History</a></li>
      <li class="nav-item"><a class="nav-link" href="faq.php"><i class="bi bi-question-circle"></i> FAQ</a></li>
    </ul>
  </div>
</nav>

<div class="container chat-container">
    <div class="chat-box" id="chatBox">
        <div class="bot-msg d-flex align-items-start">
            <img src="https://img.icons8.com/office/40/000000/robot.png" class="avatar">
            <div>Hello! I am <strong>MediAssist AI</strong>. Enter your symptoms and I will guide you on possible conditions and advice.</div>
        </div>
    </div>
    <div class="input-group mt-3">
        <input type="text" id="userInput" class="chat-input form-control" placeholder="Type symptom(s)...">
        <button class="btn btn-primary send-btn" onclick="sendMessage()"><i class="bi bi-send-fill"></i></button>
    </div>
</div>

<script>
const chatBox = document.getElementById('chatBox');
const input = document.getElementById('userInput');

function sendMessage(){
    let text = input.value.trim();
    if(!text) return;
    
    // User message
    const userDiv = document.createElement('div');
    userDiv.classList.add('message','user-msg','d-flex','align-items-end');
    userDiv.innerText = text;
    chatBox.appendChild(userDiv);

    input.value = '';
    chatBox.scrollTop = chatBox.scrollHeight;

    // Bot response (redirect to result.php)
    setTimeout(()=>{
        const botDiv = document.createElement('div');
        botDiv.classList.add('message','bot-msg','d-flex','align-items-start');
        botDiv.innerHTML = `<img src="https://img.icons8.com/office/40/000000/robot.png" class="avatar"><div>Fetching advice...</div>`;
        chatBox.appendChild(botDiv);
        chatBox.scrollTop = chatBox.scrollHeight;

        // Redirect using POST dynamically
        const form = document.createElement('form');
        form.method = "POST";
        form.action = "result.php";
        const inputHidden = document.createElement('input');
        inputHidden.type = "hidden";
        inputHidden.name = "symptom";
        inputHidden.value = text;
        form.appendChild(inputHidden);
        document.body.appendChild(form);
        form.submit();
    },500);
}

// Allow Enter key to send
input.addEventListener("keypress", function(e){
    if(e.key==="Enter"){ sendMessage(); e.preventDefault(); }
});
</script>

</body>
</html>