const { isPatternOrGradient } = require("chart.js/helpers")

function data() {
  function getThemeFromLocalStorage() {
    // if user already changed the theme, use it
    if (window.localStorage.getItem('dark')) {
      return JSON.parse(window.localStorage.getItem('dark'))
    }

    // else return their preferences
    return (
      !!window.matchMedia &&
      window.matchMedia('(prefers-color-scheme: dark)').matches
    )
  }

  function setThemeToLocalStorage(value) {
    window.localStorage.setItem('dark', value)
  }

  return {
    dark: getThemeFromLocalStorage(),
    toggleTheme() {
      this.dark = !this.dark
      setThemeToLocalStorage(this.dark)
    },
    isSideMenuOpen: false,
    toggleSideMenu() {
      this.isSideMenuOpen = !this.isSideMenuOpen
    },
    closeSideMenu() {
      this.isSideMenuOpen = false
    },
    isNotificationsMenuOpen: false,
    toggleNotificationsMenu() {
      this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
    },
    closeNotificationsMenu() {
      this.isNotificationsMenuOpen = false
    },
    isProfileMenuOpen: false,
    toggleProfileMenu() {
      this.isProfileMenuOpen = !this.isProfileMenuOpen
    },
    closeProfileMenu() {
      this.isProfileMenuOpen = false
    },
    isPagesMenuOpen: false,
    togglePagesMenuEnvironment() {
      this.isPagesMenuOpen = !this.isPagesMenuOpen
    },
    isPagesMenuOpenHealth: false,
    togglePagesMenuHealth() {
      this.isPagesMenuOpenHealth = !this.isPagesMenuOpenHealth
    },
    isPagesMenuOpenReporting: false,
    togglePagesMenuReporting() {
      this.isPagesMenuOpenReporting = !this.isPagesMenuOpenReporting
    },
    isPagesMenuOpenPengaturan: false,
    togglePagesMenuPengaturan() {
      this.isPagesMenuOpenPengaturan = !this.isPagesMenuOpenPengaturan
    },
    isPagesMenuOpenEnvResponsive: false,
    togglePagesMenuEnvResponsive() {
      this.isPagesMenuOpenEnvResponsive = !this.isPagesMenuOpenEnvResponsive
    },
    isPagesMenuOpenHealthRes: false,
    togglePagesMenuHealthRes() {
      this.isPagesMenuOpenHealthRes = !this.isPagesMenuOpenHealthRes
    },
    isPagesMenuOpenReportRes: false,
    togglePagesMenuReportRes() {
      this.isPagesMenuOpenReportRes = !this.isPagesMenuOpenReportRes
    },
    isPagesMenuOpenPengaturanRes: false,
    togglePagesMenuPengaturanRes() {
      this.isPagesMenuOpenPengaturanRes = !this.isPagesMenuOpenPengaturanRes
    },

    // Modal
    isModalOpen: false,
    trapCleanup: null,
    openModal() {
      this.isModalOpen = true
      this.trapCleanup = focusTrap(document.querySelector('#modal'))
    },
    closeModal() {
      this.isModalOpen = false
      this.trapCleanup()
    },
  }
}
