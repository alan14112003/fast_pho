<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Http\Requests\Slide\StoreRequest;
use App\Http\Requests\Slide\UpdateRequest;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    use ResponseTrait;

    public function all(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $slidesQr = Slide::query();
            if ($request->has('status') && $request->get('status') !== 'All') {
                $slidesQr->where('status', '=', $request->get('status'));
            }
            return $this->responseTrait('Thành công', true, $slidesQr->paginate());
        } catch (\Exception $e) {
            return $this->responseTrait('có lỗi! ' . $e->getMessage());
        }
    }

    public function allEnable(): \Illuminate\Http\JsonResponse
    {
        try {
            $slides = Slide::query()->where('status', '=',1)->orderBy('index')
                ->get();

            return $this->responseTrait('Thành công', true, $slides);
        } catch (\Exception $e) {
            return $this->responseTrait('có lỗi! ' . $e->getMessage());
        }
    }

    public function get($id): \Illuminate\Http\JsonResponse
    {
        try {
            $slide = Slide::query()->find($id);

            if (is_null($slide)) {
                return $this->responseTrait('Không tồn tại slide với id này');
            }

            return $this->responseTrait('Thành công ', true, $slide);
        } catch (\Exception $e) {
            return $this->responseTrait('có lỗi! ' . $e->getMessage());
        }
    }

    public function lastIndex(): \Illuminate\Http\JsonResponse
    {
        $slideLastIndex = Slide::query()->latest('index')->first();
        $lastIndex = $slideLastIndex ? $slideLastIndex->index : 0;
        return $this->responseTrait('Thành công', true, $lastIndex);
    }

    public function store(StoreRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $index = $request->get('index');
            DB::statement("
                update slides
                set `index` = `index` + 1
                where `index` >= $index
            ");
            $slide = Slide::query()->create($request->validated());

            $src = Storage::disk('public')->putFileAs(
                "images/slides/{$slide->id}",
                $request->file('src'),
                "image.{$request->file('src')->extension()}"
            );

            $slide->update([
                'src' => $src,
            ]);

            return $this->responseTrait('Thành công ', true);
        } catch (\Exception $e) {
            return $this->responseTrait('có lỗi! ' . $e->getMessage());
        }
    }

    public function update(UpdateRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        try {
            $slide = Slide::query()->find($id);

            if (is_null($slide)) {
                return $this->responseTrait('Không tồn tại slide với id này');
            }

            if ($slide->index != $request->get('index')) {
                Slide::query()
                    ->where('index', $request->get('index'))
                    ->update([
                        'index' => $slide->index,
                    ]);
            }

            $src = $slide->src;

            if ($request->hasFile('src')) {
                $src = Storage::disk('public')->putFileAs(
                    "images/slides/{$slide->id}",
                    $request->file('src'),
                    "image.{$request->file('src')->extension()}"
                );
            }

            $data = $request->validated();
            $data['src'] = $src;

            $slide->update($data);

            return $this->responseTrait('Thành công ', true);
        } catch (\Exception $e) {
            return $this->responseTrait('có lỗi! ' . $e->getMessage());
        }
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        try {
            $slide = Slide::query()->find($id);
            if (is_null($slide)) {
                return $this->responseTrait('Không tồn tại slide với id này');
            }

            Storage::disk('public')->deleteDirectory("images/slides/{$id}");

            DB::statement("
                update slides
                set `index` = `index` - 1
                where `index` > $slide->index
            ");

            $slide->delete();

            return $this->responseTrait('Thành công', true);
        } catch (\Exception $e) {
            return $this->responseTrait('có lỗi! ' . $e->getMessage());
        }
    }
}
