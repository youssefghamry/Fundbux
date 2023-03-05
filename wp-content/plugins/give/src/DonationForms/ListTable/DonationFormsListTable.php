<?php

namespace Give\DonationForms\ListTable;

use Give\DonationForms\ListTable\Columns\DateCreatedColumn;
use Give\DonationForms\ListTable\Columns\DonationCountColumn;
use Give\DonationForms\ListTable\Columns\DonationRevenueColumn;
use Give\DonationForms\ListTable\Columns\GoalColumn;
use Give\DonationForms\ListTable\Columns\IdColumn;
use Give\DonationForms\ListTable\Columns\LevelsColumn;
use Give\DonationForms\ListTable\Columns\ShortcodeColumn;
use Give\DonationForms\ListTable\Columns\StatusColumn;
use Give\DonationForms\ListTable\Columns\TitleColumn;
use Give\Framework\ListTable\ListTable;

/**
 * @since 2.24.0
 */
class DonationFormsListTable extends ListTable
{
    /**
     * @since 2.24.0
     *
     * @inheritDoc
     */
    public function id(): string
    {
        return 'donationForms';
    }

    /**
     * @since 2.24.0
     *
     * @inheritDoc
     */
    public function getDefaultColumns(): array
    {
        return [
            new IdColumn(),
            new TitleColumn(),
            new LevelsColumn(),
            new GoalColumn(),
            new DonationCountColumn(),
            new DonationRevenueColumn(),
            new ShortcodeColumn(),
            new DateCreatedColumn(),
            new StatusColumn(),
        ];
    }

    /**
     * @since 2.24.0
     *
     * @inheritDoc
     */
    public function getDefaultVisibleColumns(): array
    {
        return [
            IdColumn::getId(),
            TitleColumn::getId(),
            LevelsColumn::getId(),
            GoalColumn::getId(),
            DonationCountColumn::getId(),
            DonationRevenueColumn::getId(),
            ShortcodeColumn::getId(),
            DateCreatedColumn::getId(),
            StatusColumn::getId(),
        ];
    }
}
