<?php

namespace HansenMakangiras\FilamentSleekTheme\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'filament-sleek:install {--publish-css : Publish theme CSS files to resources/css} {--publish-config : Publish configuration file to config/filament-sleek-theme.php}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install and set up Filament Sleek Theme';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('');
        $this->line('  <bg=blue;fg=white;options=bold> FILAMENT SLEEK THEME </>  Installation & Setup');
        $this->info('');

        $publishCss = (bool) $this->option('publish-css');
        $publishConfig = (bool) $this->option('publish-config');

        if (! $publishCss && $this->input->isInteractive()) {
            $publishCss = $this->confirm('Would you like to publish the theme CSS to resources/css/filament/sleek-theme?', false);
        }

        if (! $publishConfig && $this->input->isInteractive()) {
            $publishConfig = $this->confirm('Would you like to publish the configuration file to config/filament-sleek-theme.php?', false);
        }

        if ($publishCss) {
            $this->call('vendor:publish', [
                '--tag' => 'filament-sleek-theme-css',
                '--force' => true,
            ]);
            $this->components->info('Theme CSS published successfully.');
        }

        if ($publishConfig) {
            $this->call('vendor:publish', [
                '--tag' => 'filament-sleek-theme-config',
                '--force' => true,
            ]);
            $this->components->info('Configuration file published successfully.');
        }

        $this->newLine();
        $this->line('  <options=bold>Next Steps:</>');
        $this->newLine();

        $this->line('  <fg=yellow>1.</> Add the theme CSS to your <fg=cyan>vite.config.js</>:');
        if ($publishCss) {
            $this->line("     <fg=gray>'resources/css/filament/sleek-theme/theme.css'</>");
        } else {
            $this->line("     <fg=gray>'vendor/hansenmakangiras/filament-sleek-theme/resources/css/theme.css'</>");
        }
        $this->line('     and run <fg=cyan>npm run build</>.');
        $this->newLine();

        $this->line('  <fg=yellow>2.</> Register the plugin in your Panel Provider (e.g. <fg=cyan>app/Providers/Filament/AdminPanelProvider.php</>):');
        $this->line('     <fg=gray>use HansenMakangiras\\FilamentSleekTheme\\FilamentSleekTheme;</>');
        $this->newLine();
        $this->line('     <fg=gray>->plugins([</>');
        $this->line('     <fg=gray>    FilamentSleekTheme::make(),</>');
        $this->line('     <fg=gray>])</>');
        $this->newLine();

        $this->components->info('Filament Sleek Theme installation completed!');

        return self::SUCCESS;
    }
}
