<?php

namespace Botble\Profile\Tables;

use Auth;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Profile\Repositories\Interfaces\ProfileInterface;
use Botble\Table\Abstracts\TableAbstract;
use Illuminate\Contracts\Routing\UrlGenerator;
use Yajra\DataTables\DataTables;
use Botble\Profile\Models\Profile;

class ProfileTable extends TableAbstract
{

    /**
     * @var bool
     */
    protected $hasActions = true;

    /**
     * @var bool
     */
    protected $hasFilter = true;

    /**
     * ProfileTable constructor.
     * @param DataTables $table
     * @param UrlGenerator $urlDevTool
     * @param ProfileInterface $profileRepository
     */
    public function __construct(DataTables $table, UrlGenerator $urlDevTool, ProfileInterface $profileRepository)
    {
        $this->repository = $profileRepository;
        $this->setOption('id', 'table-plugins-profile');
        parent::__construct($table, $urlDevTool);

        if (!Auth::user()->hasAnyPermission(['profile.edit', 'profile.destroy'])) {
            $this->hasOperations = false;
            $this->hasActions = false;
        }
    }

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     * @since 2.1
     */
    public function ajax()
    {
        $data = $this->table
            ->eloquent($this->query())
            ->editColumn('name', function ($item) {
                if (!Auth::user()->hasPermission('profile.edit')) {
                    return $item->name;
                }
                return anchor_link(route('profile.edit', $item->id), $item->name);
            })
            ->editColumn('checkbox', function ($item) {
                return table_checkbox($item->id);
            })
            ->editColumn('created_at', function ($item) {
                return date_from_database($item->created_at, config('core.base.general.date_format.date'));
            })
            ->editColumn('status', function ($item) {
                return $item->status->toHtml();
            });

        return apply_filters(BASE_FILTER_GET_LIST_DATA, $data, $this->repository->getModel())
            ->addColumn('operations', function ($item) {
                return table_actions('profile.edit', 'profile.destroy', $item);
            })
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * Get the query object to be processed by table.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     * @since 2.1
     */
    public function query()
    {
        $model = $this->repository->getModel();
        if(auth()->user()->super_user == 1){
            $query = $model->select([
                'profiles.id',
                'profiles.name',
                'profiles.description',
                'profiles.content',
                'profiles.image',
                'profiles.author_id',
                'profiles.created_at',
                'profiles.status',
            ]);
        }else {
            $query = $model->select([
                'profiles.id',
                'profiles.name',
                'profiles.description',
                'profiles.content',
                'profiles.image',
                'profiles.author_id',
                'profiles.created_at',
                'profiles.status',
            ])->where('profiles.author_id', auth()->user()->id);
        }
        return $this->applyScopes(apply_filters(BASE_FILTER_TABLE_QUERY, $query, $model));
    }

    /**
     * @return array
     * @since 2.1
     */
    public function columns()
    {
        return [
            'id' => [
                'name'  => 'profiles.id',
                'title' => trans('core/base::tables.id'),
                'width' => '20px',
            ],
            'name' => [
                'name'  => 'profiles.name',
                'title' => trans('core/base::tables.name'),
                'class' => 'text-left',
            ],
            'created_at' => [
                'name'  => 'profiles.created_at',
                'title' => trans('core/base::tables.created_at'),
                'width' => '100px',
            ],
            'status' => [
                'name'  => 'profiles.status',
                'title' => trans('core/base::tables.status'),
                'width' => '100px',
            ],
        ];
    }

    /**
     * @return array
     * @since 2.1
     * @throws \Throwable
     */
    public function buttons()
    {
        $buttons = $this->addCreateButton(route('profile.create'), 'profile.create');

        return apply_filters(BASE_FILTER_TABLE_BUTTONS, $buttons, Profile::class);
    }

    /**
     * @return array
     * @throws \Throwable
     */
    public function bulkActions(): array
    {
        return $this->addDeleteAction(route('profile.deletes'), 'profile.destroy', parent::bulkActions());
    }

    /**
     * @return array
     */
    public function getBulkChanges(): array
    {
        return [
            'profiles.name' => [
                'title'    => trans('core/base::tables.name'),
                'type'     => 'text',
                'validate' => 'required|max:120',
            ],
            'profiles.status' => [
                'title'    => trans('core/base::tables.status'),
                'type'     => 'select',
                'choices'  => BaseStatusEnum::labels(),
                'validate' => 'required|in:' . implode(',', BaseStatusEnum::values()),
            ],
            'profiles.created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'type'  => 'date',
            ],
        ];
    }
}
