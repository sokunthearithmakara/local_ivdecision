<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

namespace local_ivdecision;

/**
 * Class form
 *
 * @package    local_ivdecision
 * @copyright  2024 Sokunthearith Makara <sokunthearithmakara@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class form extends \mod_interactivevideo\form\base_form {
    /**
     * Sets data for dynamic submission
     * @return void
     */
    public function set_data_for_dynamic_submission(): void {
        $data = $this->set_data_default();
        $this->set_data($data);
    }

    /**
     * Form definition
     *
     * @return void
     */
    public function definition() {
        $mform = &$this->_form;

        $this->standard_elements();

        $mform->addElement(
            'text',
            'title',
            '<i class="bi bi-question iv-mr-2"></i>' . get_string('destquestion', 'local_ivdecision')
        );
        $mform->setType('title', PARAM_TEXT);
        $mform->setDefault('title', get_string('defaulttitle', 'mod_interactivevideo'));
        $mform->addRule('title', get_string('required'), 'required', null, 'client');

        $mform->addElement('hidden', 'content', $this->optional_param('content', '', PARAM_RAW));
        $mform->setType('content', PARAM_RAW);
        $mform->addElement('html', '<label class="d-flex align-items-center col-form-label iv-pl-0 w-100 justify-content-between">
        <span><i class="bi bi-signpost-split-fill iv-mr-2"></i>' . get_string('destination', 'local_ivdecision') .
            '</span><span class="btn btn-sm btn-primary iv-float-right" id="add-destination"><i class="bi bi-plus-lg"></i></span>
            </label><div id="destination-list" class="w-100 mb-3"></div>');
        $mform->addElement('static', 'destination', '', '');
        $mform->addElement('advcheckbox', 'char1', '', get_string('allowskip', 'local_ivdecision'), ["group" => 1], [0, 1]);
        $this->advanced_form_fields([
            'hascompletion' => false,
        ]);
        $this->close_form();
        $actionbuttons = '<div class="d-flex justify-content-end mb-3 iv-mt-n3" id="form-action-btns">';
        if ($this->optional_param('id', 0, PARAM_INT) > 0) {
            $actionbuttons .= '<button class="btn btn-primary iv-mr-2" id="submitform-submit">'
                . get_string('savechanges') . '</button><button class="btn btn-secondary" id="cancel-submit">'
                . get_string('cancel') . '</button>';
        } else {
            $actionbuttons .= '<button class="btn btn-primary iv-mr-2" id="submitform-submit">' . get_string('submit')
                . '</button><button class="btn btn-secondary" id="cancel-submit">'
                . get_string('cancel') . '</button>';
        }
        $actionbuttons .= '</div>';
        $mform->addElement('html', $actionbuttons);
    }

    /**
     * Form validation
     *
     * @param array $data form data
     * @param array $files form files
     * @return array
     */
    public function validation($data, $files) {
        $errors = parent::validation($data, $files);

        if (empty($data['content'])) {
            $errors['destination'] = get_string('youmusthaveatleastonedestination', 'local_ivdecision');
        }

        return $errors;
    }
}
