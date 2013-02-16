<div class="paging">
      <?php
      echo $this->Paginator->first(' < ' . __('First ', true), array('class' => 'disabled'));
      
      echo $this->Paginator->prev(' << ' . __('Previous', true), array(), null, array('class' => 'disabled'));
      
      echo $this->Paginator->numbers(array('class' => 'numbers', 'first' => false, 'last' => false));
      
      echo $this->Paginator->next(__('Next', true) . ' >> ', array(), null, array('class' => 'next disabled'));
      
      echo $this->Paginator->last(__('Last', true) . ' > ', array('class' => 'disabled'));
      
      
      echo $this->Paginator->counter('<small>' . __('Number of records found:') . ' {:count}</small>');
      ?>
</div>