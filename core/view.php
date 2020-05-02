<?class View {
    function generate_empty ($content_view, $data=null)
    {
        include 'application/views/'.$content_view;
    }
    function generate ($content_view,$template_view, $data=null)
    {
        include 'application/views/'.$template_view;
    }
}
?>