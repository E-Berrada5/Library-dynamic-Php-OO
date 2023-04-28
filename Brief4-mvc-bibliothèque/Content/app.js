
//FORMULAIRE DE CONNEXION 

// On récupère l'élément HTML du formulaire de connexion grâce à son ID
const loginForm = document.querySelector('#loginForm');

// Si le formulaire existe
if (loginForm) {
  // On ajoute un événement d'écoute pour la soumission du formulaire
  loginForm.addEventListener('submit', (event) => {
    // On récupère les champs email et password grâce à leur ID
    const emailInput = document.querySelector('#email');
    const passwordInput = document.querySelector('#password');
    
    // Si l'un des champs est vide, on affiche une alerte et on empêche la soumission du formulaire
    if (!emailInput.value || !passwordInput.value) {
      alert('Veuillez remplir tous les champs!');
      event.preventDefault(); // empêche la soumission du formulaire
    }

    // Si le mot de passe est trop court ou trop long, on affiche une alerte et on empêche la soumission du formulaire
    if (passwordInput.value.length < 4 || passwordInput.value.length > 30) {
      alert("Le mot de passe doit contenir entre 4 et 30 caractères.");
      event.preventDefault();
    }

    // Si l'email n'est pas valide, on empêche la soumission du formulaire
    if (!validateEmail(emailInput)) {
      event.preventDefault();
    }
  });
}




//FORMULAIRE INSCRIPTION

// On récupère l'élément HTML du formulaire d'inscription grâce à son ID
const signupForm = document.querySelector('#signupForm');

// Si le formulaire existe
if (signupForm) {
  // On ajoute un événement d'écoute pour la soumission du formulaire
  signupForm.addEventListener("submit", function (e) {
    // On récupère les champs nom, prénom, email et password grâce à leur ID
    const nom = document.getElementById("inom");
    const prenom = document.getElementById("iprenom");
    const email = document.getElementById("imail");
    const password = document.getElementById("ipassword");

    // Si le nom est trop court ou trop long, on affiche une alerte et on empêche la soumission du formulaire
    if (nom.value.length < 2 || nom.value.length > 30) {
      alert("Le nom doit contenir entre 2 et 30 caractères.");
      e.preventDefault();
    }
    // Si le prénom est trop court ou trop long, on affiche une alerte et on empêche la soumission du formulaire
    if (prenom.value.length < 2 || prenom.value.length > 30) {
      alert("Le prénom doit contenir entre 2 et 30 caractères.");
      e.preventDefault();
    }
    // Si l'email est trop court ou trop long, on affiche une alerte et on empêche la soumission du formulaire
    if (email.value.length < 8 || email.value.length > 30) {
      alert("Le mail doit contenir entre 8 et 30 caractères.");
      e.preventDefault();
    }
    // Si le mot de passe est trop court ou trop long, on affiche une alerte et on empêche la soumission du formulaire
    if (password.value.length < 8 || password.value.length > 30) {
      alert("Le mot de passe doit contenir entre 8 et 30 caractères.");
      e.preventDefault();
    }

    // Si l'email n'est pas valide, on empêche la soumission du formulaire
    if (!validateEmail(email)) {
      e.preventDefault();
    }
  });
}

// Cette fonction prend un paramètre email qui représente l'élément HTML de l'adresse e-mail à valider
function validateEmail(email) {
  // On définit une expression régulière pour vérifier que l'email est valide
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  // Si l'adresse e-mail n'est pas valide
  if (!emailRegex.test(email.value)) {
    // On affiche une alerte pour informer l'utilisateur qu'il doit saisir une adresse e-mail valide
    alert("Veuillez saisir une adresse e-mail valide.");
    // On peut également placer le focus sur le champ email pour aider l'utilisateur à corriger l'erreur, mais cette ligne est commentée dans le code
    // email.focus();
    // On retourne la valeur "false" pour indiquer que la validation a échoué
    return false;
  }
  // Si l'adresse e-mail est valide, on retourne la valeur "true" pour indiquer que la validation a réussi
  return true;
}
