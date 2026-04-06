<?php
// Exercise 11-5: implement the grant application viewer page.
// TODO: implement the viewer page to display the submitted application data:
// - Create a new page that reads the JSON file and renders a list of submitted
//   applications.
// - List just a few key fields (e.g. applicant name, project title, and project
//   date) in the main list and then link to a detail page for each application
//   that shows all the fields.
// - Use query parameters to indicate which application to show on the detail
//   page (e.g. `/viewer?id=ga_123456`), and make sure to handle cases where the
//   specified application does not exist.
// - Include a link back to the list from the detail page.
// - You can choose how to format the output, but the detail should include all
//   fields for each application and any fields shown on either page should be
//   properly escaped to prevent XSS.