<?php


namespace App\Services\General;


use App\Entities\EmailTemplate;
use App\Services\BaseService;

class EmailTemplateService extends BaseService
{
    /**
     * @return mixed|string
     */
    public function model()
    {
        return EmailTemplate::class;
    }

    /**
     * @param  string  $slug
     * @return Builder|Model
     */
    public function getBySlug($slug)
    {
        return $this->model->whereRaw("LOWER(slug)=LOWER('$slug')")->firstOrFail();
    }

    /**
     * @param $slug
     * @param array $data
     * @return mixed
     */
    public function getcontent($slug, $data = []) {
        $template = $this->getBySlug($slug);
        $template->content = $this->parseContent($template->content,$data);
        $template->title = $this->parseContent($template->title,$data);

        return $template;
    }

    /**
     * @param $content
     * @param array $data
     * @return string|string[]
     */
    public function parseContent($content, $data = []) {
        foreach ($data as $key=>$val) {
            $content = str_replace('['.$key.']', $val, $content);
        }

        return $content;
    }
}
