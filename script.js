const firebaseConfig = {
  apiKey: "AIzaSyDFLidSwfuF3ZsUev0Sb-IU5xt5UQfv6Ew",
  authDomain: "portfolio-html-4517d.firebaseapp.com",
  projectId: "portfolio-html-4517d",
  storageBucket: "portfolio-html-4517d.firebasestorage.app",
  messagingSenderId: "1024150056388",
  appId: "1:1024150056388:web:57ad9110bac9aa77238891",
  measurementId: "G-0BCCR1JNFB"
};

firebase.initializeApp(firebaseConfig);
const db = firebase.firestore();

document.getElementById("contactForm").addEventListener("submit", async (e) => {
  e.preventDefault();
  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const message = document.getElementById("message").value;

  try {
    await db.collection("messages").add({ name, email, message, createdAt: new Date() });
    document.getElementById("status").innerText = "Message sent!";
  } catch (err) {
    console.error("Error:", err);
    document.getElementById("status").innerText = "Failed to send message.";
  }
});