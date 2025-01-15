import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './vendor/awcodes/filament-versions/resources/**/*.blade.php',
        // './vendor/diogogpinto/filament-auth-ui-enhancer/resources/**/*.blade.php',
        './vendor/awcodes/filament-table-repeater/resources/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                white: '#FFFFFF',
                platinum: '#E8E9EB',
                moonlight: '#F6F5F3',
                'translucent': {
                    light: 'rgba(255, 255, 255, 0.5)',
                    DEFAULT: 'rgba(255, 255, 255, 0.5)',
                    dark: 'rgba(25, 25, 25, 0.5)',
                },
            },
        }
    }
}
