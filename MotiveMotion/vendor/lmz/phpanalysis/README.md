# phpanalysis
基于phpanalysis的功能封装,方便使用php语言分词

```
    \Phpanalysis\PhpAnalysis::$loadInit = false;
    $pa = new \Phpanalysis\PhpAnalysis('utf-8', 'utf-8', true);
    //载入词典
    $pa->LoadDict();
    //执行分词
    $pa->SetSource('今天不要忘记给智聪带面膜
    昨天喝了咖啡，晚上失眠，现在蓝瘦香菇
    北京天气变得好冷了，秋风萧瑟');
    $pa->differMax = true;
    $pa->unitWord = true;
    $pa->StartAnalysis( true );
    $okresult = $pa->GetFinallyResult('###', false);

    print_r($okresult);
```