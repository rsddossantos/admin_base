import 'vuetify/styles'
import { createVuetify } from 'vuetify'

export default createVuetify({
    theme: {
        defaultTheme: 'adminBase',
        themes: {
            adminBase: {
                dark: false,
                colors: {
                    primary: '#0f766e',
                    'on-primary': '#ffffff',
                    secondary: '#0f172a',
                    background: '#0f172a',
                    surface: '#ffffff',
                },
            },
        },
    },
})
