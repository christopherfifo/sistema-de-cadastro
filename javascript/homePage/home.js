const btnTrocaThema = document.getElementById("trocaTema");

// Aplica o tema salvo ou preferência do sistema apenas ao carregar a página
const aplicarTema = () => {
  const userPref = localStorage.getItem("theme");
  const systemPrefersDark = window.matchMedia(
    "(prefers-color-scheme: dark)"
  ).matches;

  if (userPref === "dark" || (!userPref && systemPrefersDark)) {
    document.documentElement.classList.add("dark");
  } else {
    document.documentElement.classList.remove("dark");
  }
};

aplicarTema();

const toggleTheme = () => {
  if (document.documentElement.classList.contains("dark")) {
    document.documentElement.classList.remove("dark");
    localStorage.setItem("theme", "light");
  } else {
    document.documentElement.classList.add("dark");
    localStorage.setItem("theme", "dark");
  }
};

// Só chama toggleTheme no clique do botão
if (btnTrocaThema) {
  btnTrocaThema.addEventListener("click", toggleTheme);
}
