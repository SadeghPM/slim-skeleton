<?php

namespace App\Kernel\Command;

use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class MakeModelCommand
{
    const MODEL_PATTERN = <<<MODEL
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class %s extends Model
{

}
MODEL;

    public function __invoke($model, SymfonyStyle $style)
    {
        $modelFile = rootPath('app')."/$model.php";
        if (file_exists($modelFile)) {
            $style->text("Model $model already exist!");
        } else {
            file_put_contents($modelFile, sprintf(self::MODEL_PATTERN, $model));
            $style->text("Model $model created!");
        }
    }
}