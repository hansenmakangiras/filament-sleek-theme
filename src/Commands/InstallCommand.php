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
    protected $signature = 'filament-sleek:install {--publish-css : Publish theme CSS files to resources/css}';

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

        $publish = (bool) $this->option('publish-css');

        if (! $publish && $this->input->isInteractive()) {
            $publish = $this->confirm('Would you like to publish the theme CSS to resources/css/filament/sleek-theme?', false);
        }

        if ($publish) {
            $this->call('vendor:publish', [
                '--tag' => 'filament-sleek-theme-css',
                '--force' => true,
            ]);
            $this->components->info('Theme CSS published successfully.');
        }

        $this->newLine();
        $this->line('  <options=bold>Next Steps:</>');
        $this->newLine();

        $this->line('  <fg=yellow>1.</> Add the theme CSS to your <fg=cyan>vite.config.js</>:');
        if ($publish) {
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
