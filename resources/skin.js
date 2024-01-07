function main() {
  // console.log("dddd")

  // 저장된 값이 있다면 조회
  const localStorageTheme = localStorage.getItem("theme");
  let currentThemeSetting = localStorageTheme === "dark" ? "dark" : ""
  // let currentThemeSetting = calculateSettingAsThemeString({ localStorageTheme, systemSettingDark });

  // updateThemeOnHtmlEl({ theme: currentThemeSetting });

  var toggleButton = document.getElementById('toggleDarkMode');
  updateButton({ buttonEl: toggleButton, isDark: currentThemeSetting === "dark" });

  // 이벤트 바인딩
  toggleButton.addEventListener("click", toggleDarkModeEventListener)

  /**
   * 다크 모드 토글 버튼을 클릭했을 때
   * 모드를 반전시키며 토글하는 이벤트.
   */
  function toggleDarkModeEventListener(e) {
    const newTheme = currentThemeSetting === "dark" ? "" : "dark"

    localStorage.setItem("theme", newTheme)


    console.log("toggleDarkMode")
    if (e.currentTarget.checked) {
      // document.querySelector("html").setAttribute("data-theme", "dark")
      updateThemeOnHtmlEl({ theme: "dark"})
    } else {
      // document.querySelector("html").setAttribute("data-theme", "")
      updateThemeOnHtmlEl({ theme: ""})
    }
  }

  /**
   * 버튼에 반영
   */
  function updateButton({ buttonEl, isDark }) {
    buttonEl.checked = isDark;
  }

}

/**
 * 테마의 변경을 적용
 */
function updateThemeOnHtmlEl({ theme }){
  document.querySelector("html").setAttribute("data-theme", theme)
}


if (document.readyState === 'interactive' || document.readyState === 'complete') {
  main(window);
} else {
  document.addEventListener('DOMContentLoaded', function () {
    main(window);
  });
}
