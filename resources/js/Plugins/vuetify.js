import 'vuetify/styles'
import '@mdi/font/css/materialdesignicons.css'
import { createVuetify } from 'vuetify'
import { aliases, mdi } from 'vuetify/iconsets/mdi'

export default createVuetify({
    icons: {
        defaultSet: 'mdi',
        aliases,
        sets: {
            mdi,
        },
    },
    theme: {
        defaultTheme: 'adminBase',
        themes: {
            adminBase: {
                dark: false,
                colors: {
                    primary: '#0f766e',
                    'primary-light': '#5eead4',
                    'primary-dark': '#115e59',
                    secondary: '#0f172a',
                    'background-dark': '#0f172a',
                    'background-light': '#f8fafc',
                    surface: '#ffffff',
                    // status
                    success: '#22c55e',
                    warning: '#f59e0b',
                    error: '#ef4444',
                    info: '#3b82f6',
                },
            },
        },
    },
})
