<table id="calendar">
    <thead>
        <tr class="month-year-row">
            <th class="previous-month"><?php echo CHtml::link('<<', $this->previousLink); ?></th>
            <th colspan="5"><?php echo $this->monthName.', '.$this->year; ?></th>
            <th class="next-month"><?php echo CHtml::link('>>', $this->nextLink); ?></th>
        </tr>
        <tr class="weekdays-row">
            <?php foreach(Yii::app()->locale->getWeekDayNames('narrow') as $weekDay): ?>
                <th><?php echo $weekDay; ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>
	<?php $this->dayIsReported(14) ?>
    <tbody>
        <tr>
        <?php $daysStarted = false; $day = 1; ?>
        <?php for($i = 1; $i <= $this->daysInCurrentMonth+$this->firstDayOfTheWeek; $i++): ?>
            <?php if(!$daysStarted) $daysStarted = ($i == $this->firstDayOfTheWeek+1); ?>
            <td class="<?php if($day == $this->day) echo 'calendar-selected-day'; ?>">
                <?php if($daysStarted && $day <= $this->daysInCurrentMonth): ?>
                    <?php echo CHtml::link($day, $this->getDayLink($day)); $day++; ?>
                <?php endif; ?>
            </td>
            <?php if($i % 7 == 0): ?>
                </tr><tr>
            <?php endif; ?>
        <?php endfor; ?>
        </tr>
    </tbody>
</table>
