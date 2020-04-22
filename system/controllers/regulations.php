<?php
class Regulations extends Controller
{
    public function index($var = "")
    {


        switch ($var) {
            case 'privacy-policy':
                $this->view('home/privacy');
                break;
            case 'content-policy':
                $this->view('home/content');
                break;
            case 'terms-of-service':
                $this->view('home/terms');
                break;
            case 'about-us':
                $this->view('home/about');
                break;
            case 'how-it-works':
                $this->view('home/how-it-works');
                break;
            case 'faq':
                $this->view('home/faq');
                break;
            default:
                $this->view('home/terms');

                break;
        }
    }
}
