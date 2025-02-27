let count = 1;
document.getElementById("radio1").checked = true;

setInterval(function() {
    nextImage()
}, 5000)

function nextImage(){
    count++;
    if(count > 3){
        count = 1;
    }
    document.getElementById("radio" + count).checked = true;

}

// Selecione o botão de troca de tema
const toggleThemeButton = document.getElementById('color_mode');

// Adicione um evento de clique ao botão
toggleThemeButton.addEventListener('click', () => {
  // Verifique se o tema atual é claro ou escuro
  const currentTheme = document.body.classList.contains('theme-light') ? 'light' : 'dark';

  // Troque o tema
  if (currentTheme === 'light') {
    document.body.classList.remove('theme-light');
    document.body.classList.add('theme-dark');
    document.querySelector('.container').classList.remove('theme-light');
    document.querySelector('.container').classList.add('theme-dark');
    document.querySelectorAll('.form-content label').forEach((label) => {
      label.classList.remove('theme-light');
      label.classList.add('theme-dark');
    });
  } else {
    document.body.classList.remove('theme-dark');
    document.body.classList.add('theme-light');
    document.querySelector('.container').classList.remove('theme-dark');
    document.querySelector('.container').classList.add('theme-light');
    document.querySelectorAll('.form-content label').forEach((label) => {
      label.classList.remove('theme-dark');
      label.classList.add('theme-light');
    });
  }
});