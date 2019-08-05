@if($model->currentPage())
    <li><a href="{{ $model->getOptions()['path'] }}/?page=1">«</a></li>
    @php
        // left side
         $path = $model->getOptions()['path'];
         $to_show = 0;
         while($to_show++ < 3 && ($model->currentPage() - $to_show) > 1){
           $page_number = $model->currentPage() - $to_show;
           echo sprintf("<li><a href='%s/?page=%d'>%s</a></li>",$path,$page_number, $page_number);
         }

         echo sprintf("<li><a href='%s/?page=%d'>%s</a></li>",$path,$model->currentPage(), $model->currentPage());
         // right side
         $to_show = 0;
         while ($to_show++ < 3 && ($model->currentPage() + $to_show) < $model->lastPage()) {
              $page_number = $model->currentPage() + $to_show;
             echo sprintf("<li><a href='%s/?page=%d'>%s</a></li>",$path,$page_number, $page_number);
         }
    @endphp
    <li><a href="{{ $model->getOptions()['path'] }}/?page={{ $model->lastPage() }}">»</a></li>
@endif
